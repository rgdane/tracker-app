<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Exports\TaskReportExport;
use App\Filament\Resources\TaskResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        $user = User::find(Auth::user()->id);

        if ($user->hasRole('staff')) {
            return [];
        }

        return [
            Actions\Action::make('export')
            ->label('Export Laporan')
            ->icon('heroicon-o-arrow-down-tray')
            ->action(function () {
                // Ambil query yang sudah difilter
                $filteredQuery = $this->getFilteredTableQuery();
                $tasks = $filteredQuery->get();
                
                return Excel::download(new TaskReportExport($tasks), 'laporan_tugas.xlsx');
            }),
            Actions\CreateAction::make()->label('Tambah Tugas'),
        ];
    }
}
