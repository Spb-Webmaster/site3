@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h3 class="border-bottom pb-2 mb-0">Cabinet</h3>

            <div class="d-flex  justify-content-between">

                <div class="pt-3">
                    <div class="d-flex text-body-secondary pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                             preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff"></rect>
                            <text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                        </svg>
                        <p class="pb-3 mb-0 small lh-sm border-bottom">
                            <strong class="d-block text-gray-dark">{{ $user->name }}</strong>
                            Name
                        </p>
                    </div>
                    <div class="d-flex text-body-secondary pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                             preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#e83e8c"></rect>
                            <text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text>
                        </svg>
                        <p class="pb-3 mb-0 small lh-sm border-bottom">
                            <strong class="d-block text-gray-dark">{{ $user->email }}</strong>
                            Email
                        </p>
                    </div>
                    <div class="d-flex text-body-secondary pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                             preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#6f42c1"></rect>
                            <text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text>
                        </svg>
                        <p class="pb-3 mb-0 small lh-sm border-bottom">
                            <strong class="d-block text-gray-dark">{{ $user->created_data }}</strong>
                            Date created
                        </p>
                    </div>

                </div>

                <div class="pt-3">
                    <div class="card">

                        <div class="container mt-2 mb-2">
                            @if($user->userProfile->avatar)
                                <img width="200"
                                     src="{{ asset('storage/images/avatars/'.$user->id. '/origin/200/' .$user->userProfile->avatar)  }}"
                                     alt="">

                            @endif
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h3 class="border-bottom pb-2 mb-0">Your Photo</h3>


            <form method="post" action="{{ route('cabinet') }}" enctype="multipart/form-data">
                @csrf

                <div class="my-3 p-3 bg-body rounded">

                    @error('avatar')
                    <span style="color: red">
                                <strong>{{ $message }}</strong>
                     </span>
                    @enderror

                    <div class="mb-3">

                        <label for="formFileCabinet" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFileCabinet" name="avatar">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                    <x-auth.primary-button class="ml-3">
                        {{ __('Upload a photo') }}
                    </x-auth.primary-button>
                </div>
            </form>
        </div>

    </div>

@endsection
