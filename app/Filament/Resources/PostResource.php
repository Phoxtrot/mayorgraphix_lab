<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static?string $navigationGroup = 'Blog';
    protected static?string $navigationLabel = 'Posts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Section::make()
                 ->schema([ 
                     Select::make('section_id')->relationship('section','title'),                   
                     FileUpload::make('image')
                     ->label('Photo')
                     ->rules('image', 'max:1024')
                     ->hint('Maximum size: 1 MB')
                     ->directory('blog/')
                     ->disk('public')
                     ->preserveFilenames()
                     ->image()
                     ->imageEditor()                
                 ])->collapsible(),
                 Section::make()
                 ->schema([
                     TextInput::make('title')->maxLength(100)
                     ->afterStateUpdated(function ($get, $set, $operation) {
                         if ($operation==="create") {
                             $slug = Str::slug($get('title'));
                             $set('slug', $slug);
                         }
                         else{
                             $slug = Str::slug($get('title'));
                             $set('slug', $slug);
                         }
                         
                     })
                     ->reactive(), 
                     TextInput::make('slug')->disabled()->dehydrated(),
                     MarkdownEditor::make('body')->label("Body")
                     ->columnSpanFull(),                                       
                 ])->columns(2),
                 Section::make()
                 ->schema([
                     Toggle::make('published')->label("published"),                                       
                     Toggle::make('trending')->label("trending"),                                       
                 ])
                    ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('section.title')->label('section')->searchable()->sortable(),
                IconColumn::make('published')->boolean(),
                IconColumn::make('trending')->boolean(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
