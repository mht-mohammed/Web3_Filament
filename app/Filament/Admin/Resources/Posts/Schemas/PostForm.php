<?php

namespace App\Filament\Admin\Resources\Posts\Schemas;

use Illuminate\Mail\Markdown;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Post as ModelsPost;
use Filament\Forms\Components\{Checkbox, ColorPicker, DatePicker, FileUpload, Markdowneditor, RichEditor, Select, TagsInput, TextInput};
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

use function Laravel\Prompts\select;

class PostForm

{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("Post Details")
                ->description("Enter the details of the post")
                ->icon(Heroicon::RocketLaunch)
                ->schema([
                    Group::make()
                    ->schema([
                       TextInput::make('title')->rules(['required', 'min:3', 'max:50'])
                        ->live(onBlur: true)
                        ->afterStateUpdated(function(string $operation, string $state, Set $set, Get $get , PostForm $post){
                            //  dd($operation, $state);
                            $set("slug", Str::slug($state));
                            // dd($get("category_id"));
                            // dd($post);
                        }),   /* TextInput::make('title')->rules("required | min:3 | max:50"),*/
                       TextInput::make('slug')->unique(ignoreRecord: false)->validationMessages([
                        'unique' => 'The slug must be unique.',
                    ]),
                       Select::make('category_id')->rule('required')
                       ->label('Category')
                    //    ->options(Category::all()->pluck('name', 'id')),
                        ->relationship("category" , "name")
                        ->searchable(),
                       ColorPicker::make('color'),
                    ])->columns(2),
                       // RichEditor::make('body'),
                       Markdowneditor::make("body"),
                ])->columnSpan(2),

            
                Group::make()
                     ->schema([

                          Section::make("image upload")
                          ->description("Configure the image for the post")
                          ->schema([
                          FileUpload::make('image')->disk('public')->directory('posts'),
                          ]),


                          Section::make("meta")
                          ->description("Configure the meta information for the post")
                          ->schema([
                              Select::make('tags')
                                    ->relationship("tags" , "name")
                                    ->multiple(),
                              Checkbox::make('published'),
                              DatePicker::make('published_at'),
                          ]),

                     ])->columnSpan(1),

            ])->columns(3);
    } 
}


// ->columnSpanFull()