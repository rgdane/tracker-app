<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Pengguna';

    protected static ?string $pluralLabel = 'Kelola Pengguna';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Informasi Pengguna')
                ->schema([
                    TextInput::make('name')
                        ->label('Nama')
                        ->placeholder('Masukkan nama pengguna')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('Email')
                        ->placeholder('Masukkan email pengguna')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true),

                    TextInput::make('password')
                        ->label('Password')
                        ->placeholder('Masukkan password pengguna minimal 8 karakter')
                        ->minLength(8)
                        ->password()
                        ->revealable()
                        ->required(fn(string $context) => $context === 'create')
                        ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                        ->dehydrated(fn($state) => filled($state))
                        ->maxLength(255),
                ]),

            Section::make('Akses & Divisi')
                ->schema([
                    Select::make('department_id')
                        ->label('Departemen')
                        ->relationship('department', 'name')
                        ->searchable()
                        ->required(),

                    Select::make('roles')
                        ->label('Peran')
                        ->relationship('roles', 'name')
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('department.name')
                    ->label('Departemen')
                    ->sortable(),

                TextColumn::make('roles.name')
                    ->label('Peran')
                    ->badge()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('department')
                    ->label('Departemen')
                    ->relationship('department','name'),
                
                SelectFilter::make('roles')
                    ->label('Peran')
                    ->relationship('roles','name')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
