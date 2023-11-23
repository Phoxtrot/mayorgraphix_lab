<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\PictureResource\Pages;
use App\Filament\Resources\PictureResource\RelationManagers;
use App\Models\Picture;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Markdown;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PictureResource extends Resource
{
    protected static ?string $model = Picture::class;

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
                    Select::make('gallery_id')->relationship('gallery','name'),                   
                    FileUpload::make('image')
                    ->label('Photo')
                    ->rules('image', 'max:1024')
                    ->hint('Maximum size: 1 MB')
                    ->directory('photos/')
                    ->disk('public')
                    ->preserveFilenames()
                    ->image()
                    ->imageEditor()                
                ])->collapsible(),
                Section::make()
                ->schema([
                    TextInput::make('description')->maxLength(20)
                    ->afterStateUpdated(function ($get, $set, $operation) {
                        if ($operation==="create") {
                            $slug = Str::slug($get('description'));
                            $set('slug', $slug);
                        }
                        else{
                            $slug = Str::slug($get('description'));
                            $set('slug', $slug);
                        }
                        
                    })
                    ->reactive(), 
                    TextInput::make('slug')->disabled()->dehydrated(),
                    TextInput::make('photo_id')->label("Photo Id")
                    ->default(strval(mt_rand(100000,999999)))
                    ->disabled()
                    ->dehydrated(),                                       
                ])->columns(2)
                ]),
                Group::make()
               ->schema([
                Section::make()
                ->schema([
                    Toggle::make('is_visible')->label("visible"), 
                    DatePicker::make('published_at')->label('date published')
                    ->default(now()),                                       
                ])
               ])
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('description'),
                IconColumn::make('is_visible')->boolean(),
                TextColumn::make('photo_id')->searchable(),
                TextColumn::make('gallery.name')->label('gallery')->searchable()->sortable(),
                TextColumn::make('published_at')->date(),
            ])
            ->filters([
                SelectFilter::make('gallery')
                ->relationship('gallery','name'),
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
            'index' => Pages\ListPictures::route('/'),
            'create' => Pages\CreatePicture::route('/create'),
            'edit' => Pages\EditPicture::route('/{record}/edit'),
        ];
    }
}
