<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Proyek';

    protected static ?string $pluralLabel = 'Kelola Proyek';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('code')
                ->label('Kode')
                ->placeholder('Masukkan kode proyek')
                ->required()
                ->unique(ignoreRecord: true),

            TextInput::make('name')
                ->label('Nama')
                ->placeholder('Masukkan nama proyek')
                ->required(),

            Textarea::make('description')
                ->label('Deskripsi')
                ->placeholder('Masukkan deskripsi proyek')
                ->rows(3)
                ->columnSpan('full'),

            DatePicker::make('start_date')
                ->label('Tanggal Mulai')
                ->required(),

            DatePicker::make('end_date')
                ->label('Tanggal Selesai'),

            Repeater::make('users')
                ->label('Anggota')
                ->schema([
                    Select::make('user_id')
                        ->label('Anggota')
                        ->options(User::pluck('name', 'id'))
                        ->disableOptionWhen(function ($value, $state, $get, $set, $livewire) {
                            // Ambil semua user_id yang sudah dipilih, kecuali current
                            $selected = collect($get('../users'))
                                ->pluck('user_id')
                                ->filter(fn($v) => $v !== $state)
                                ->toArray();

                            return in_array($value, $selected);
                        })
                        ->required(),

                    TextInput::make('role')
                        ->label('Peran')
                        ->datalist([
                            'Developer',
                            'PM',
                            'QA',
                        ])
                        ->placeholder('Contoh: Developer, PM, QA')
                ])
                ->defaultItems(1)
                ->addActionLabel('Tambah Anggota')
                ->columns(2)
                ->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Kode')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date('d M Y'),

                TextColumn::make('end_date')
                    ->label('Selesai')
                    ->date('d M Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                    ->modalHeading('Detail Proyek')
                    ->mutateRecordDataUsing(function (array $data, \Illuminate\Database\Eloquent\Model $record): array {
                        $data['users'] = $record->users->map(fn($user) => [
                            'user_id' => $user->id,
                            'role' => $user->pivot->role,
                        ])->toArray();

                        return $data;
                    })
                    ->form([
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Belum ada deskripsi')
                            ->rows(3)
                            ->columnSpan('full'),

                        Repeater::make('users')
                            ->label('Anggota Proyek')
                            ->schema([
                                Select::make('user_id')
                                    ->label('Nama')
                                    ->options(User::pluck('name', 'id')->toArray())
                                    ->disabled(),

                                TextInput::make('role')
                                    ->label('Peran')
                                    ->disabled(),
                            ])
                            ->columns(2)
                            ->visible(fn($state) => count($state ?? []) > 0),

                        // Fallback helper if kosong
                        TextInput::make('empty_state')
                            ->label('')
                            ->placeholder('Belum ada anggota')
                            ->visible(fn($get) => count($get('users') ?? []) === 0),
                    ]),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
