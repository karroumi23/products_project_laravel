<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Sections';
    protected static ?string $modelLabel = 'Section';
    protected static ?string $pluralModelLabel = 'Sections';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([

            // ─── GENERAL ──────────────────────────────────────────
            Forms\Components\Section::make('Général')
                ->schema([
                    Forms\Components\TextInput::make('label')
                        ->label('Nom affiché')
                        ->required(),
                    Forms\Components\Select::make('order')
                        ->label('Ordre')
                        ->options([1=>1, 2=>2, 3=>3, 4=>4, 5=>5])
                        ->required(),
                    Forms\Components\Toggle::make('enabled')
                        ->label('Activée')
                        ->default(true),
                ])->columns(3),

            // ─── HERO ─────────────────────────────────────────────
            Forms\Components\Section::make('Contenu Hero')
                ->visible(fn (Get $get) => $get('name') === 'hero')
                ->schema([
                    Forms\Components\TextInput::make('content.badge_text')
                        ->label('Badge'),
                    Forms\Components\TextInput::make('content.title_main')
                        ->label('Titre principal'),
                    Forms\Components\TextInput::make('content.title_highlight')
                        ->label('Mot mis en rouge'),
                    Forms\Components\TextInput::make('content.title_suffix')
                        ->label('Suite du titre'),
                    Forms\Components\Textarea::make('content.subtitle')
                        ->label('Sous-titre')
                        ->columnSpanFull(),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('content.btn_primary_text')
                            ->label('Bouton 1 — Texte'),
                        Forms\Components\TextInput::make('content.btn_primary_url')
                            ->label('Bouton 1 — URL'),
                        Forms\Components\TextInput::make('content.btn_secondary_text')
                            ->label('Bouton 2 — Texte'),
                        Forms\Components\TextInput::make('content.btn_secondary_url')
                            ->label('Bouton 2 — URL'),
                    ]),

                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('content.stat1_number')->label('Stat 1 — Nombre'),
                        Forms\Components\TextInput::make('content.stat1_label')->label('Stat 1 — Label'),
                        Forms\Components\TextInput::make('content.stat2_number')->label('Stat 2 — Nombre'),
                        Forms\Components\TextInput::make('content.stat2_label')->label('Stat 2 — Label'),
                        Forms\Components\TextInput::make('content.stat3_number')->label('Stat 3 — Nombre'),
                        Forms\Components\TextInput::make('content.stat3_label')->label('Stat 3 — Label'),
                    ]),
                ])->columns(2),

            // ─── PARTNERS ─────────────────────────────────────────
            Forms\Components\Section::make('Contenu Partenaires')
                ->visible(fn (Get $get) => $get('name') === 'partners')
                ->schema([
                    Forms\Components\TextInput::make('content.title')
                        ->label('Titre de la section')
                        ->columnSpanFull(),
                    Forms\Components\Repeater::make('content.partners')
                        ->label('Partenaires')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Nom du partenaire')
                                ->required(),
                            Forms\Components\FileUpload::make('logo')
                                ->label('Logo')
                                ->image()
                                ->directory('partners')
                                ->disk('public'),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),
                ]),

            // ─── SERVICES ─────────────────────────────────────────
            Forms\Components\Section::make('Contenu Services')
                ->visible(fn (Get $get) => $get('name') === 'services')
                ->schema([
                    Forms\Components\TextInput::make('content.title')
                        ->label('Titre'),
                    Forms\Components\TextInput::make('content.subtitle')
                        ->label('Sous-titre'),
                    Forms\Components\Repeater::make('content.services')
                        ->label('Services')
                        ->schema([
                            Forms\Components\TextInput::make('icon')
                                ->label('Icône Bootstrap (ex: bi-tools)'),
                            Forms\Components\TextInput::make('title')
                                ->label('Titre du service'),
                            Forms\Components\Textarea::make('description')
                                ->label('Description'),
                        ])
                        ->columns(3)
                        ->columnSpanFull(),
                ])->columns(2),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->label('Section')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('enabled')
                    ->label('Activée'),
                Tables\Columns\SelectColumn::make('order')
                    ->label('Ordre')
                    ->options([1=>1, 2=>2, 3=>3, 4=>4, 5=>5])
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->actions([
                Tables\Actions\EditAction::make()->label('Modifier'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit'   => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}