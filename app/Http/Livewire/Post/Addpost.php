<?php

namespace App\Http\Livewire\Post;
use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Addpost extends Component
{
    public $author, $cat_id, $title,$content;

    public function addPost(){
        $this->validate([
            'author'            =>['required', 'string' ,'max:255'],
            'cat_id'            =>['required', 'int'],
            'title'             =>['required', 'string' ,'max:255'],
            'content'           =>['required', 'string' ,'max:255'],

        ]);

        Post::create([
            'author'            =>$this->author,
            'cat_id'            =>$this->cat_id,
            'title'             =>$this->title,
            'content'           =>$this->content,
        ]);
        return redirect('/post')->with('message','Post Added Successfully!');
    }

    public function loadPost(){
        $categories = Category::orderBy('category')->get();
        return compact('categories');
    }
    public function render()
    {
        return view('livewire.post.addpost', $this->loadPost());
    }
}
