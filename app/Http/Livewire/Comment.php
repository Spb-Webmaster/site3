<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comment extends Component
{

    public $model;

    public $title;

    public $text;

    protected $rules = [
        'title' => 'required|string|min:2|max:100',
        'text' => 'required|string|min:2|max:100'
    ];

    public function render()
    {
        return view('livewire.comment');
    }
    public function add()
    {
       $this->validate();
        $this->model->comments()->create([
            'title' => $this->title,
            'text' => $this->text,
            'user_id' => auth()->id(),
        ]);

        $this->model->refresh();
        $this->reset('title', 'text');
    }
}
