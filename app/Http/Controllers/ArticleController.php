<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


   //$article = Article::query()->find(24);
       // dd($article->media);
        // $user = User::find(1);
      //    $article = Article::query()->find(1);
       // dd($article->categories()->sync([1 => ['is_published'  => true, 'priority' =>100]]));



        // dump($article->comments);
        // dd($user->userProfile->address); // userProfile()->updateOrCreate(['address' => 'testAddress']))
        // dd($article->user->name);

        $query = Article::query()
            ->where('published', 1);

        $articles = $query->latest('id')
            ->paginate(50);




      //  $articles = Article::with('categories')->get();



        return view('posts.index', [
            'posts' => $articles,
        ]);
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
    public function show(string $alias)
    {



        $post = (Article::query()->where('id', $alias)->first()) ?  :
                 Article::query()->where('slug', $alias)->first();



        $query  = Article::query()->where('published', 1);
        $items =  $query->where('id', '!=', $post->id)->limit(12)->get();





        return view('posts.post', [
            'post' => $post,
            'items' => $items,
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
