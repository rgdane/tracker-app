<?php

namespace App\Filament\Resources;

use App\Exports\TaskReportExport;
use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
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
use Maatwebsite\Excel\Facades\Excel;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'carbon-task';

    protected static ?string $navigationLabel = 'Tugas';

    protected static ?string $pluralLabel = 'Kelola Tugas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('project_id')
                    ->relationship('project', 'name')
                    ->label('Proyek')
                    ->required()
                    ->reactive(), // Trigger re-render pada perubahan nilai

                Select::make('user_id')
                    ->label('Ditugaskan Kepada')
                    ->options(function ($get) {
                        $projectId = $get('project_id');

                        if (!$projectId) return [];

                        $project = \App\Models\Project::with('users')->find($projectId);

                        return $project?->users->pluck('name', 'id') ?? [];
                    })
                    ->required(),

                TextInput::make('title')
                    ->label('Judul')
                    ->placeholder('Masukkan judul tugas')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->placeholder('Masukkan deskripsi tugas')
                    ->rows(4)
                    ->columnSpan('full'),

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
                    ->required(),
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
            ->filters([
                SelectFilter::make('project')
                    ->label('Proyek')
                    ->relationship('project', 'name'),

                SelectFilter::make('user')
                    ->label('Ditugaskan Kepada')
                    ->relationship('user', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
}
