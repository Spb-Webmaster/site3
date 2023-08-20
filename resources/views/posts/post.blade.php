@extends('layouts.layout')
@section('content')
    <div class="m-3">
        <div class="container">

            <div class="card shadow-sm py-3">
                <div class="container">
                    <div class="position_relative">
                        <img src="{{ asset('storage/' . $post->img) }}" alt="{{$post->title}}">
                    </div>

                    <x-fancybox>

                        <div class="m-3">

                            @foreach($post->getMedia('gallery') as $media)

                                @if($media)

                                    <a data-fancybox="gallery" data-caption="{{ $media->id }}" href="{{ $media->getUrl() }}">
                                        <img src="{{  $media->getUrl('thumb') }}" height="200" />
                                    </a>

                                @endif

                            @endforeach

                        </div>

                    </x-fancybox>

                </div>

                <div class="card-body">
                    @livewire('comment', ['model' => $post ])
                </div>

                <div class="card-body">
                    <p class="card-text">{{ $post->title }}</p>
                    <p class="card-text">  {!!  isset($post->user->name)? '<b>Author</b> - '. $post->user->name :'' !!}</p>




                    <hr>

                    <div class="card-text mb-3">


                        @foreach($post->categories as $category)

                            @if(isset($category->title))

                                <div class="text-success"><b><a href="{{ route('cats.index', $category->slug ) }}">
                                            {{ $category->title }}
                                        </a></b>
                                </div>

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


                    <x-swiper>

                        @foreach($items as $item)
                            <swiper-slide>
                                <div class="img__widht">

                                    <div class="d-flex gap-2 justify-content-start py-4">
                                        <a class="category_link"
                                           href="{{ route('posts.post', ($item->slug)?:$item->id) }}">
                                    <span
                                        class="badge d-flex p-2 align-items-center text-primary-emphasis bg-primary-subtle rounded-pill">
                                        <p class="card-text"> {{$item->title}}</p>
                                    </span>
                                        </a>

                                        @foreach($item->categories as $category)

                                            @if(isset($category->title))
                                                <a class="category_link"
                                                   href="{{ route('cats.index', $category->slug ) }}">

                                                    <span
                                                        class="badge d-flex align-items-center p-1 pe-2 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-pill"><img
                                                            class="rounded-circle me-1" width="20" height="20"
                                                            src="{{ asset('storage/' . $category->img) }}" alt="">
                                                   {{ $category->title }} </span>
                                                </a>
                                            @endif

                                        @endforeach

                                    </div>

                                    <a href="{{ route('posts.post', ($item->slug)?:$item->id) }}">
                                        <img width="200" src="{{ asset('storage/' . $item->img) }}"
                                             alt="{{$item->title}}">
                                    </a>

                                </div>
                            </swiper-slide>
                        @endforeach

                    </x-swiper>


                </div>


            </div>


        </div>
    </div>
@endsection

