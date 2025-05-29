<?php

namespace App\Filament\Resources;

use App\Models\Task;
use Filament\Resources\Resource;
use App\Filament\Resources\TaskReportResource\Pages;
use App\Models\Project;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TaskReportResource extends Resource
{
    protected static ?string $model = Project::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 5;
    
    protected static ?string $navigationLabel = 'Laporan Tugas';

    protected static ?string $modelLabel = 'Laporan Tugas';
    
    protected static ?string $pluralModelLabel = 'Laporan Tugas';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Proyek')
                    ->searchable(),

                TextColumn::make('assigned_to')
                    ->label('Ditugaskan Kepada')
                    ->getStateUsing(function ($record) {
                        $userId = request()->query('tableFilters')['user']['value'] ?? null;

                        $query = $record->tasks()->with('user');

                        if ($userId) {
                            $query->where('user_id', $userId);
                        }

                        return $query->get()
                            ->pluck('user.name')
                            ->unique()
                            ->join(', ');
                    }),

                TextColumn::make('to_do_count')
                    ->label('To Do')
                    ->numeric(),

                TextColumn::make('in_progress_count')
                    ->label('In Progress')
                    ->numeric(),

                TextColumn::make('done_count')
                    ->label('Done')
                    ->numeric(),

                TextColumn::make('total_tasks')
                    ->label('Total Tugas')
                    ->numeric()
                    ->getStateUsing(fn($record) =>
                    $record->to_do_count + $record->in_progress_count + $record->done_count),
            ])
            ->filters([
                SelectFilter::make('id')
                    ->label('Project')
                    ->options(Project::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload(),

                SelectFilter::make('user')
                    ->label('User')
                    ->attribute(null) // jangan default
                    ->options(User::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->query(function (Builder $query, array $data): Builder {
                        if (!empty($data['value'])) {
                            return $query->whereHas('tasks', function ($q) use ($data) {
                                $q->where('user_id', $data['value']);
                            });
                        }
                        return $query;
                    })
                    ->indicateUsing(function (array $data): ?string {
                        if (!empty($data['value'])) {
                            $user = User::find($data['value']);
                            return $user ? 'User: ' . $user->name : null;
                        }
                        return null;
                    }),
                
                Filter::make('date_range')
                    ->form([
                        DatePicker::make('start_date'),
                        DatePicker::make('end_date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['start_date'],
                                fn(Builder $query, $date): Builder => $query->whereHas(
                                    'tasks',
                                    fn($q) => $q->whereDate('created_at', '>=', $date)
                                ),
                            )
                            ->when(
                                $data['end_date'],
                                fn(Builder $query, $date): Builder => $query->whereHas(
                                    'tasks',
                                    fn($q) => $q->whereDate('created_at', '<=', $date)
                                ),
                            );
                    }),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->withCount([
                    'tasks as to_do_count' => fn($q) => $q->where('status', 'To Do'),
                    'tasks as in_progress_count' => fn($q) => $q->where('status', 'In Progress'),
                    'tasks as done_count' => fn($q) => $q->where('status', 'Done'),
                ]);
            });
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTaskReports::route('/'),
        ];
    }
}
