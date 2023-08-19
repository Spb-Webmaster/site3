<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use Leeto\MoonShineTree\Resources\TreeResource;

use MoonShine\Fields\Image;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class CategoryResource extends TreeResource
{
	public static string $model = Category::class;

	public static string $title = 'Categories';

    public static string $orderField = 'sorting';

    public string $titleField = 'title';


    public function fields(): array
	{
		return [
		    ID::make()->sortable(),
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

    public function treeKey(): ?string
    {
        return null;
    }

    public function sortKey(): string
    {
        return 'sorting';
    }
}
