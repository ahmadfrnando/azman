<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananTransportasiResource\Pages;
use App\Filament\Resources\PesananTransportasiResource\RelationManagers;
use App\Models\PesananTransportasi;
use App\Models\Transportasi;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PesananTransportasiResource extends Resource
{
    protected static ?string $model = PesananTransportasi::class;

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationGroup = 'Pesanan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_user')
                    ->label('Pilih Customer')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('id_transportasi')
                    ->label('Pilih Transportasi')
                    ->options(Transportasi::all()->pluck('nama', 'id'))
                    ->required()
                    ->searchable(),
                Forms\Components\DatePicker::make('tanggal_jemput')
                    ->required(),
                Forms\Components\TextInput::make('waktu_jemput')
                    ->required(),
                Forms\Components\Textarea::make('lokasi_jemput')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('lokasi_tujuan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jumlah_kendaraan')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jumlah_hari')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jumlah_penumpang')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('no_hp')
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('transportasi.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_jemput')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('waktu_jemput'),
                Tables\Columns\TextColumn::make('jumlah_kendaraan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_hari')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_penumpang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
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
            'index' => Pages\ListPesananTransportasis::route('/'),
            'create' => Pages\CreatePesananTransportasi::route('/create'),
            'edit' => Pages\EditPesananTransportasi::route('/{record}/edit'),
        ];
    }
}
