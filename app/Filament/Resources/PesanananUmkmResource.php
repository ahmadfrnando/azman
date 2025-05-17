<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesanananUmkmResource\Pages;
use App\Filament\Resources\PesanananUmkmResource\RelationManagers;
use App\Models\PemesananUmkm;
use App\Models\Umkm;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PesanananUmkmResource extends Resource
{
    protected static ?string $model = PemesananUmkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pesanan';

    protected static ?string $navigationLabel = 'Pesanan UMKM';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_user')
                    ->label('Pilih Customer')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('id_umkm')
                    ->label('Pilih Penginapan')
                    ->options(Umkm::all()->pluck('nama', 'id'))
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('no_hp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_pemesanan')
                    ->required(),
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
                Tables\Columns\TextColumn::make('umkm.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_pemesanan')
                    ->date()
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
            'index' => Pages\ListPesanananUmkms::route('/'),
            'create' => Pages\CreatePesanananUmkm::route('/create'),
            'edit' => Pages\EditPesanananUmkm::route('/{record}/edit'),
        ];
    }
}
