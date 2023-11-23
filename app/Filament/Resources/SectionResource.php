<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Components\Section as ComponentsSection;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static?string $navigationGroup = 'Blog';
    protected static?string $navigationLabel = 'Categories';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ComponentsSection::make()
                    ->schema([
                        TextInput::make('title')
                        ->afterStateUpdated(function ($get, $set, ?string $state) {
                            if (filled($state)) {
                                $set('slug', Str::slug($state));
                            }
                        })
                        ->reactive(),
                        TextInput::make('slug')
                        ->unique()
                        ->dehydrated(),
                        TextInput::make('description'),
                    ])        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('description'),
                TextColumn::make('created_at')->date(),
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}
