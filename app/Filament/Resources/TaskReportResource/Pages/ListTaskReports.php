<?php

namespace App\Filament\Resources\TaskReportResource\Pages;

use App\Filament\Resources\TaskReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaskReports extends ListRecords
{
    protected static string $resource = TaskReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
