<?php

namespace App\MoonShine\Resources;

use App\MoonShine\Resources\fields\ItemImg;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\BelongsToMany;
use MoonShine\Fields\Image;
use MoonShine\Fields\Slug;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class ArticleResource extends Resource
{
    public static string $model = Article::class;

    public static string $title = 'Articles';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),

            Grid::make([
                Column::make([
                    Block::make('Анкета', [


                        Text::make('Имя', 'title')
                            ->hint('Обязательное поле')
                            //  ->addLink('link', 'https://spb-webmaster.ru', '_blank')
                            ->required(),
                        Slug::make('alias', 'slug')->from('title')
                            ->separator('-')
                            ->unique()
                            ->hideOnIndex(),
                        Image::make('Изображение', 'img')
                            ->hint('На витрину')

                            ->dir('/images') /* Директория где будут хранится файлы в storage (по умолчанию /) */
                            ->disk('public') // Filesystems disk
                            ->allowedExtensions(['jpg', 'gif', 'png', 'svg']) /* Допустимые расширения */
                            ->removable(),

                        ItemImg::make('Изображение', 'Item-img')
                            ->hideOnIndex(),

                        MediaLibrary::make('Галерея', 'gallery')
                            ->hideOnIndex()
                            ->removable()
                            ->multiple(),


                        Block::make('Описание', [

                            TinyMce::make('description')
                                ->hideOnIndex()
                                ->fieldContainer(false),

                        ]),



                    ]),
                ])->columnSpan(8),
                Column::make([
                    Block::make('Дополнительно', [

                        BelongsTo::make('Автор', 'author', 'name')
                            ->searchable(),

                        belongsToMany::make('Категория', 'cat', 'title')
                            ->searchable()
                            ->select()
                            ->inLine(separator: ' ', badge: true),
                        SwitchBoolean::make('Опубликовать', 'published'),


                    ]),
                ])->columnSpan(4),

            ]),

        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
