<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Illuminate\Validation\ValidationException;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected ?string $heading = 'Tambah Proyek';

    public function getBreadcrumb(): string
    {
        return 'Tambah';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $userIds = collect($data['users'])->pluck('user_id');

        if ($userIds->duplicates()->isNotEmpty()) {
            throw ValidationException::withMessages([
                'users.0.user_id' => ['Anggota tidak boleh duplikat.'],
            ]);
        }
        
        $users = $data['users'] ?? [];
        unset($data['users']);

        $data['users'] = $users;

        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->data['users'] ?? [] as $user) {
            $this->record->users()->attach((int) $user['user_id'], [
                'role' => $user['role'],
            ]);
        }
    }
}
