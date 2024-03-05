<?php

namespace App\Livewire\Web\Posts;

use App\Models\Posts;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;
    public $posts_new;
    public $perpage = 10;

    public function render()
    {
        $this->posts_new = Posts::orderBy('created_at', 'desc')->limit(6)->get();
        return view('livewire.web.posts.list-posts', ['list_posts' => Posts::paginate($this->perpage)]);
    }
}
