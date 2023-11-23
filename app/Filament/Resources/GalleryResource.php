<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static?string $navigationGroup = 'Portfolio';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                ->schema([
                    Section::make()
                    ->schema([
                        Select::make('category_id')->relationship('category','name'), 
                        TextInput::make('name')
                        ->afterStateUpdated(function ($get, $operation, $set, ?string $state) {
                            if ($operation!=="create") {
                                return;
                            }
                            $set('slug', Str::slug($state));
                        })
                        ->reactive(),
                        TextInput::make('slug')->disabled()->dehydrated(),
                        TextInput::make('description'),
                        TextInput::make('primary_hex')
                            ->type('color') // The HTML input type as color
                            ->label('Color') // The label of the field
                            ->helperText('Please choose a color.') // The help message below the field
                           
                            ->extraAttributes(['class' => 'h-50']),
                            // ->rules('regex:~^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$ ~'), // The validation rule to ensure a valid hex color code
                        TextInput::make('url'),
                        Toggle::make('is_visible')->label("visible"),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('category.name')->label("Category"),
                ColorColumn::make('primary_hex')
                ->label('Color'),
                IconColumn::make('is_visible')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
