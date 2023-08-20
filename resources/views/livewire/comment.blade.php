<div>

    <form wire:submit.prevent="add">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="comment__left col-7">
                <div class="m-2">
                    <input type="text" class="form-control" wire:model="title"/>
                    @error('title')
                    <p class="card-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="m-2">
                    <textarea class="form-control"  wire:model="text" cols="30" rows="10"></textarea>
                    @error('text')
                    <p class="card-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="m-2">
                    <button class="btn btn-primary w-100 py-2 ml-3">Отправить</button>
                </div>
            </div>
            <div class="comment__right col-5">

                @foreach($model->comments as $comment)

                    @if($comment->active)
                    <p class="card-text"><b>{{ $comment->user->name }}</b></p>
                    <p class="card-text">{{ $comment->title }}</p>
                    @endif

                @endforeach

            </div>
        </div>
    </form>

</div>
