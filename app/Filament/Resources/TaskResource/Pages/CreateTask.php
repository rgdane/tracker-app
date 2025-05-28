<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected ?string $heading = 'Tambah Tugas';

    public function getBreadcrumb(): string {
        return 'Tambah';
    }
}
