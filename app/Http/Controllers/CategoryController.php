<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $slug)
    {



/*          $posts = DB::table('articles')
            ->where('active', 1)
            ->orderBy('projectdate', 'desc')->paginate(10);*/

        $cat_id = Category::query()->where('slug', $slug)->first()->id;

        $category = Category::find($cat_id);
        $articles =  $category->articles; // вернет все продукты для категории 1

      //  dd($articles);

/*        $query = Article::query()
            ->where('published', 1);*/

      //  $articles = $articles->paginate(50);


/*
       foreach ($articles as $article) {
            foreach ($article->categories as $category) {
                // dump($category->title);
                if($title == $category->title) {

                }
            }
        }

*/
/*        dd($articles);


        $query = Article::query()
            ->where('published', 1);

        $articles = $query->latest('id')
            ->paginate(50);
*/



        return view('cats.index', [
            'posts' => $articles,
            'slug' => $slug,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
