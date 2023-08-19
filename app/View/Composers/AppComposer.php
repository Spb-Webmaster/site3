<?php

namespace App\View\Composers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;

class AppComposer
{


    public function compose(View $view): void
    {

       // dd(url()->current());

        $category = Category::query()->orderBy('sorting')->get();

        $view->with('category_menu', $category);

    }
}
