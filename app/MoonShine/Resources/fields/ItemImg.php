<?php

namespace App\MoonShine\Resources\fields;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use MoonShine\Fields\Field;

class ItemImg extends Field
{
    protected static string $view = 'moonshine.fields.item-img';

    protected bool $group = true;


    public function save(Model $item): Model
    {
        $values = $this->requestValue();;
        return $item;

    }

}
