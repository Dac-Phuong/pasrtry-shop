<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Posts;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    public $search = '';
    public $perpage = 10;
    public $posts;
    protected $listeners = [
        'success' => 'update',
        'delete' => 'delete',
    ];
    public function render()
    {
        return view('livewire.admin.posts.list-posts', ['list_posts' => Posts::search($this->search)->paginate($this->perpage)]);
    }
    public function update()
    {
        $this->posts = Posts::all();
    }
    public function delete($id)
    {
        $posts = Posts::find($id);
        if (!is_null($posts)) {
            $filePath = public_path('image_posts/' . $posts->image);
            Storage::disk('public')->delete("image_posts/" . $posts->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $posts->delete();
        }
        $this->dispatch('success', 'Xóa bài viết thành công');
    }
}
