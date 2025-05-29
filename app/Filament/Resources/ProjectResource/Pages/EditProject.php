<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected ?string $heading = 'Ubah Proyek';

    public function getBreadcrumb(): string {
        return 'Ubah';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $users = $data['users'] ?? [];
        unset($data['users']);

        $data['users'] = $users;
        
        return $data;
    }

    protected function afterSave(): void
    {
        $data = $this->data;
        $record = $this->record;
        // Sync ulang semua user yang terlibat dalam proyek
        $syncedUsers = collect($data['users'] ?? [])
            ->mapWithKeys(fn ($user) => [
                $user['user_id'] => ['role' => $user['role']],
            ])
            ->toArray();

        $record->users()->sync($syncedUsers);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['users'] = $this->record->users->map(fn ($user) => [
            'user_id' => $user->id,
            'role' => $user->pivot->role,
        ])->toArray();

        return $data;
    }
}
