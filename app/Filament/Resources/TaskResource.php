<?php

namespace App\Filament\Resources;

use App\Exports\TaskReportExport;
use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'carbon-task';

    protected static ?string $navigationLabel = 'Tugas';

    protected static ?int $navigationSort = 4;

    protected static ?string $pluralLabel = 'Kelola Tugas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('project_id')
                    ->relationship('project', 'name')
                    ->label('Proyek')
                    ->required()
                    ->reactive()
                    ->disabled(fn() => User::find(Auth::user()->id)->hasRole('staff')), // Trigger re-render pada perubahan nilai

                Select::make('user_id')
                    ->label('Ditugaskan Kepada')
                    ->options(function ($get) {
                        $projectId = $get('project_id');

                        if (!$projectId) return [];

                        $project = \App\Models\Project::with('users')->find($projectId);

                        return $project?->users->pluck('name', 'id') ?? [];
                    })
                    ->required()
                    ->disabled(fn() => User::find(Auth::user()->id)->hasRole('staff')),

                TextInput::make('title')
                    ->label('Judul')
                    ->placeholder('Masukkan judul tugas')
                    ->required()
                    ->maxLength(255)
                    ->disabled(fn() => User::find(Auth::user()->id)->hasRole('staff')),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->placeholder('Masukkan deskripsi tugas')
                    ->rows(4)
                    ->columnSpan('full')
                    ->disabled(fn() => User::find(Auth::user()->id)->hasRole('staff')),

                Select::make('status')
                    ->options([
                        'To Do' => 'To Do',
                        'In Progress' => 'In Progress',
                        'Done' => 'Done',
                    ])
                    ->label('Status')
                    ->required(),

                DatePicker::make('deadline')
                    ->label('Tenggat')
                    ->required()
                    ->disabled(fn() => User::find(Auth::user()->id)->hasRole('staff')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('project.name')
                    ->label('Proyek')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Ditugaskan Kepada')
                    ->sortable(),

                TextColumn::make('status')
                    ->colors([
                        'primary' => 'To Do',
                        'warning' => 'In Progress',
                        'success' => 'Done',
                    ])
                    ->sortable()
                    ->badge(),

                TextColumn::make('deadline')
                    ->label('Tenggat')
                    ->sortable()
                    ->date('d M Y'),
            ])
            ->filters(self::getFilters())
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                    ->modalHeading('Detail Tugas')
                    ->form([
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Belum ada deskripsi')
                            ->rows(3)
                            ->columnSpan('full'),
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getFilters(): array
    {
        $user = User::find(Auth::user()->id);

        $filters = [];

        // Filter Proyek: hanya proyek yang diikuti user (staff, manager)
        $filters[] = SelectFilter::make('project_id')
            ->label('Proyek')
            ->options(function () {
                $user = User::find(Auth::user()->id);

                if ($user->hasRole(['staff', 'manager'])) {
                    return \App\Models\Project::whereHas('users', function ($q) use ($user) {
                        $q->where('user_id', $user->id);
                    })->pluck('name', 'id');
                }

                // Untuk non-staff, ambil semua proyek
                return \App\Models\Project::pluck('name', 'id');
            });

        // Filter User: hanya muncul jika bukan staff
        if (!$user->hasRole('staff')) {
            $filters[] = SelectFilter::make('user_id')
                ->label('Ditugaskan Kepada')
                ->options(function () use ($user) {
                    // Jika manajer, tampilkan user yang ikut proyek yang sama
                    if ($user->hasRole('manager')) {
                        // Ambil semua proyek yang diikuti manajer
                        $projectIds = $user->projects()->pluck('projects.id');

                        // Ambil user yang terlibat di proyek-proyek tersebut
                        return \App\Models\User::whereHas('projects', function ($query) use ($projectIds) {
                            $query->whereIn('projects.id', $projectIds);
                        })->pluck('name', 'id');
                    }

                    // Untuk non-staff lain (misal: super-admin), tampilkan semua user
                    return \App\Models\User::pluck('name', 'id');
                });
        }

        return $filters;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = User::find(Auth::user()->id);

        if ($user->hasRole('staff')) {
            // Ambil hanya task yang dimiliki staff
            return $query->where('user_id', auth()->id());
        }

        if ($user->hasRole('manager')) {
            // Ambil ID semua project yang dimiliki atau diikuti manager
            $projectIds = $user->projects()->pluck('projects.id');

            // Ambil semua task yang ada di proyek tersebut
            return $query->whereIn('project_id', $projectIds);
        }

        return $query;
    }
}
