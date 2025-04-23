<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransportasiResource\Pages;
use App\Filament\Resources\TransportasiResource\RelationManagers;
use App\Models\Transportasi;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Filament\Support\RawJs;
use Illuminate\Support\Str;

class TransportasiResource extends Resource
{
    protected static ?string $model = Transportasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug'),
                TextInput::make('no_wa')->numeric()->required(),
                TextInput::make('total_kendaraan')->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('tersedia', $state)),
                TextInput::make('tersedia'),
                TextInput::make('maksimal_penumpang')->numeric()
                ->minValue(1)
                ->maxValue(8)
                ->required(),
                TextInput::make('harga')
                    ->label('Harga Per Hari')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric(),
                RichEditor::make('deskripsi')->required()->columnSpan(2),
                FileUpload::make('gambar')->required()
                    ->label('Upload Gambar max 1 MB')
                    ->directory('transportasi')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    ->maxSize(1024)
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->rowIndex(),
                TextColumn::make('nama')->searchable(),
                TextColumn::make('slug')->searchable(),
                TextColumn::make('tersedia')->searchable(),
                ImageColumn::make('gambar')->label('Gambar'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTransportasis::route('/'),
        ];
    }
}
