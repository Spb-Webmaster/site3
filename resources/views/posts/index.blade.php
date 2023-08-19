@extends('layouts.layout')

@section('content')


    <div class="m-3">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach($posts as $post)
                    <div class="col col__{{ $post->id  }}">
                        <div class="card shadow-sm py-3">
                            <div class="container">
                                <a class="position_relative" href="{{ route('posts.post', ($post->slug)?:$post->id) }}">
                                    <img src="{{ asset('storage/' . $post->img) }}" alt="{{$post->title}}">
                                </a>
                            </div>


                            <div class="card-body">
                                <p class="card-text"><a class="position_relative" href="{{ route('posts.post', ($post->slug)?:$post->id) }}">{{ $post->title }}</a></p>
                                <p class="card-text">  {!!  isset($post->user->name)? '<b>Author</b> - '. $post->user->name :'' !!}</p>





                                <div class="card-text mb-3">

                                    @foreach($post->categories as $category)
                                        @if(isset($category->title))
                                            <a class="category_link"
                                                 href="{{ route('cats.index', $category->slug ) }}">
                                                <div class="text-success"><b>
                                                        {{ $category->title }}
                                                    </b>
                                                </div>
                                            </a>
                                        @endif

                                    @endforeach
                                </div>


                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group ">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Изменено</button>
                                        <button type="button"
                                                class="btn btn-sm btn-outline-secondary"> {{ $post->updated_at?->diffForHumans() }} </button>
                                    </div>
                                    <small class="text-body-secondary"> {{ $post->updated_at?->format('d. m. Y') }} </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="container">
                <div class="m-4">
                    {{--   {{ $posts->links() }}--}}
                </div>
            </div>
        </div>
    </div>
@endsection


