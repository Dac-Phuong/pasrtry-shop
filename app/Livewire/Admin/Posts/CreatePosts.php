<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreatePosts extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $image;
    public $posts;
    public $description;
    public $label = "Thêm bài viết";

    protected $listeners = ['update' => 'mount'];
    public function mount($id = null)
    {
        $this->posts = Posts::find($id);
        if ($this->posts) {
            $this->label = "Sửa bài viết";
            $this->title = $this->posts->title;
            $this->description = $this->posts->description;
            $this->content = $this->posts->content;
            $this->dispatch('data', $this->posts->content);
        } else {
            $this->dispatch('empty');
            $this->reset();
        }
    }
    public function submit()
    {
        if ($this->posts) {
            $this->posts->title = $this->title;
            $this->posts->content = $this->content;
            $this->posts->description = $this->description;

            if ($this->image) {
                $ext = $this->image->extension();
                $file_name = time() . '-' . 'posts.' . $ext;
                $this->image->storeAs('image_posts', $file_name, 'public');
                $this->image = $file_name;
                $this->posts->image = $this->image;
            }

            $this->posts->save();
            $this->dispatch('success', 'Sửa bài viết thành công');
        } else {
            $this->validate(
                [
                    'title' => 'required|string|',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'content' => 'required',
                    'description' => 'required',
                ],
                [
                    'title.required' => 'Vui lòng nhập tiêu đề bài viết.',
                    'image.required' => 'Vui lòng chọn ảnh đại diện.',
                    'image.image' => 'Tệp tải lên phải là ảnh.',
                    'image.mimes' => 'Định dạng ảnh không hợp lệ. Chấp nhận các định dạng: jpeg, png, jpg, gif, svg.',
                    'image.max' => 'Kích thước ảnh không được vượt quá 2MB.',
                    'content.required' => 'Vui lòng nội dung bài viết.',
                    'description.required' => 'Vui lòng nhập mô tả bài viết.',
                ]
            );

            if ($this->image) {
                $ext = $this->image->extension();
                $file_name = time() . '-' . 'posts.' . $ext;
                $this->image->storeAs('image_posts', $file_name, 'public');
                $this->image = $file_name;
            }
            $customer = Posts::create([
                'title' => $this->title,
                'image' => $this->image,
                'content' => $this->content,
                'description' => $this->description,
                'user_id' => Auth::user()->name,
            ]);

            $customer->save();
            $this->dispatch('success', 'Thêm bài viết thành công');
        }

        $this->reset(['title', 'image', 'content']);
    }

    public function render()
    {
        return view('livewire.admin.posts.create-posts');
    }
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
