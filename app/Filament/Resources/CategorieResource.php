<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategorieResource\Pages;
use App\Models\Categorie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;


class CategorieResource extends Resource
{
    protected static ?string $model = Categorie::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Catégories';
    protected static ?string $modelLabel = 'Catégorie';
    protected static ?string $pluralModelLabel = 'Catégories';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
             Section::make()
              ->columns([
                        'default' => 3,
                        'sm' => 3,
                    ])->schema([
            Forms\Components\TextInput::make('nom')
                ->label('Nom')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('parent_id')
                ->label('Catégorie parente')
                ->options(fn () => Categorie::whereNull('parent_id')->pluck('nom', 'id'))
                ->searchable()
                ->nullable()
                ->placeholder('Aucune (catégorie principale)'),
                    ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nom')
                ->label('Nom')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('parent.nom')
                ->label('Catégorie parente')
                ->placeholder('—')
                ->sortable(),

            Tables\Columns\TextColumn::make('enfants_count')
                ->label('Sous-catégories')
                ->counts('enfants')
                ->sortable(),

            Tables\Columns\TextColumn::make('products_count')
                ->label('Produits')
                ->counts('products')
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Date création')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('parent_id')
                ->label('Type')
                ->options([
                    'null' => 'Principale',
                ])
                ->query(fn ($query, $data) => $data['value'] === 'null'
                    ? $query->whereNull('parent_id')
                    : $query),
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
            'index'  => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategorie::route('/create'),
            'edit'   => Pages\EditCategorie::route('/{record}/edit'),
        ];
    }
}
