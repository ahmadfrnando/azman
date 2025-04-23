<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananPenginapanResource\Pages;
use App\Filament\Resources\PesananPenginapanResource\RelationManagers;
use App\Models\Penginapan;
use App\Models\PesananPenginapan;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PesananPenginapanResource extends Resource
{
    protected static ?string $model = PesananPenginapan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pesanan';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_user')
                    ->label('Pilih Customer')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('id_penginapan')
                    ->label('Pilih Penginapan')
                    ->options(Penginapan::all()->pluck('nama', 'id'))
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('no_hp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_kamar')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jumlah_hari')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_checkin')
                    ->required(),
                Forms\Components\TextInput::make('jumlah_orang')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total_harga')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\Toggle::make('status_pesanan')
                    ->required(),
                Forms\Components\Textarea::make('catatan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('penginapan.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_kamar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_hari')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_checkin')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_orang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_harga')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('status_pesanan'),
                Tables\Columns\ToggleColumn::make('is_riwayat')->label('Pesanan Selesai'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPesananPenginapans::route('/'),
            'create' => Pages\CreatePesananPenginapan::route('/create'),
            'edit' => Pages\EditPesananPenginapan::route('/{record}/edit'),
        ];
    }
}
