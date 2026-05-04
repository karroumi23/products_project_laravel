<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\Categorie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Produits';
    protected static ?string $modelLabel = 'Produit';
    protected static ?string $pluralModelLabel = 'Produits';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\TextInput::make('nom')
                ->label('Nom du produit')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('categorie_id')
                ->label('Catégorie')
                ->options(Categorie::pluck('nom', 'id'))
                ->required()
                ->searchable(),

            // ─── PRIX + TVA + TTC ─────────────────────────────
            Forms\Components\Grid::make(3)->schema([

                Forms\Components\TextInput::make('prix')
                    ->label('Prix HT (MAD)')
                    ->numeric()
                    ->required()
                    ->suffix('MAD')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, $state) {
                        $tva = floatval($get('tva') ?? 20);
                        $prix = floatval($state ?? 0);
                        $set('prix_ttc', round($prix * (1 + $tva / 100), 2));
                    }),

                Forms\Components\TextInput::make('tva')
                    ->label('TVA (%)')
                    ->numeric()
                    ->default(20)
                    ->required()
                    ->suffix('%')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, $state) {
                        $tva = floatval($state ?? 20);
                        $prix = floatval($get('prix') ?? 0);
                        $set('prix_ttc', round($prix * (1 + $tva / 100), 2));
                    }),

                Forms\Components\TextInput::make('prix_ttc')
                    ->label('Prix TTC (MAD)')
                    ->numeric()
                    ->suffix('MAD')
                    ->disabled()
                    ->dehydrated() // sauvegarde même si disabled
                    ->helperText('Calculé automatiquement'),

            ]),
            // ──────────────────────────────────────────────────

            Forms\Components\TextInput::make('stock')
                ->label('Stock')
                ->numeric()
                ->default(0),

            Forms\Components\FileUpload::make('image')
                ->label('Image')
                ->image()
                ->directory('products')
                ->disk('public')
                ->visibility('public')
                ->nullable(),

            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')
                ->getStateUsing(fn ($record) => asset('storage/' . $record->image)),

            Tables\Columns\TextColumn::make('nom')
                ->label('Nom')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('categorie.nom')
                ->label('Catégorie'),

            Tables\Columns\TextColumn::make('prix')
                ->label('Prix HT')
                ->money('MAD')
                ->sortable(),

            Tables\Columns\TextColumn::make('tva')
                ->label('TVA')
                ->formatStateUsing(fn ($state) => $state . '%'),

            Tables\Columns\TextColumn::make('prix_ttc')
                ->label('Prix TTC')
                ->money('MAD')
                ->sortable(),

            Tables\Columns\TextColumn::make('stock')
                ->label('Stock')
                ->sortable()
                ->color(fn ($state) => $state <= 5 ? 'danger' : 'success'),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Date création')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->actions([
            Tables\Actions\EditAction::make()->label('Modifier'),
            Tables\Actions\DeleteAction::make()->label('Supprimer'),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Supprimer sélection'),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}