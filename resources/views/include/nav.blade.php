<header class="p-3 mb-3 border-bottom bg-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="{{ active_link('posts*') }}"><a href="{{ route('posts.index') }}"
                                                           class="nav-link px-2 ">Catalog</a>
                </li>


                <li class="{{ active_link('cats*') }}"><a href="#"
                                                          class="nav-link  px-2  d-block link-body-emphasis text-decoration-none dropdown-toggle"
                                                          data-bs-toggle="dropdown" aria-expanded="false">Categories</a>

                    <ul class="dropdown-menu text-small">
                        @foreach($category_menu as $menu)
                            @if(isset($slug))
                                @php $active  = ($slug == $menu->slug) ? 'active' : '' @endphp
                            @else
                                {{ $active = '' }}
                            @endif

                            <li class="{{ $active }}"><a class="dropdown-item"
                                                         href="{{ route('cats.index', $menu->slug) }}">
                                    {{ $menu->title }}
                                </a></li>

                        @endforeach

                    </ul>


                </li>
                <li><a href="/" class="nav-link px-2">Contacts</a></li>

            </ul>


            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="dropdown text-end">

                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src = "{{ $user_32_avatar }}" alt = "mdo" width = "32" height = "32" class="rounded-circle" />

                </a>


                <ul class="dropdown-menu text-small">

                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth

                                <li class="{{ active_link('posts*') }}"><a href="{{ route('posts.index') }}"
                                                                           class="dropdown-item">Catalog</a></li>
                                <li class="{{ active_link('cabinet*') }}"><a class="dropdown-item" href="{{ route('cabinet.index') }}">Cabinet</a></li>
                                <li>
                                    <form class="dropdown-form" method="post" action="{{ route('logout') }}">
                                        @csrf
                                        <input type="submit" class="dropdown-item" value="Exit"/>
                                    </form>
                            @else

                                <li class="{{ active_link('posts*') }}"><a href="{{ route('posts.index') }}"
                                                                           class="dropdown-item">Catalog</a></li>

                                <li class="{{ active_link('login') }}"><a href="{{ route('login') }}"
                                                                          class="dropdown-item">Log in</a></li>

                                @if (Route::has('register'))
                                    <li class="{{ active_link('register') }}"><a href="{{ route('register') }}"
                                                                                 class="dropdown-item">Register</a></li>
                                @endif
                            @endauth
                        </div>
                    @endif


                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Test</a></li>
                </ul>


            </div>
        </div>
    </div>
</header>

