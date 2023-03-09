<?php

namespace App\Http\Livewire\Post;
use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{

    public $sort_post='all', $search, $post_delete_id;
    use WithPagination;
    protected $paginationTheme ='bootstrap';

    public function loadPosts(){
        $query = Post::orderBy('author')->search($this->search)
        ->with('category');
        if($this->sort_post !='all'){
            $query->where('cat_id', $this->sort_post);
        }
        $posts= $query->paginate(3);
        return compact('posts');
    }

    public function loadCat(){
        $categories= Category::orderBy('category')->get();
        return compact('categories');
    }
    public function editConfirmation($id){
        $post = Post::findOrFail($id);
        $this->post_id       = $id;
        $this->author       = $post->author;
        $this->title        = $post->title;
        $this->content      = $post->content;
        $this->cat_id       = $post->cat_id;
    }

    public $post_id;
    public function update()
    {
        $this->validate([
            'author'     => 'required',
            'cat_id'     => 'required',
            'title'      => 'required',
            'content'    => 'required',
        ]);

        $post = Post::find($this->post_id);
        $post->update([
            'author'    => $this->author,
            'cat_id'    => $this->cat_id,
            'title'     => $this->title,
            'content'   => $this->content,
        ]);

        return redirect('/post')->with('message', 'Updated Successfully');
    }

    public function deleteConfirmation($id){
        $this->post_delete_id =$id;
    }

    public function deletePostData(){
         $post = Post::where('id', $this->post_delete_id)->first();
        $post->delete();

        return redirect('/post')->with('message','Post Deleted Successfully');
        $this->post_delete_id ="";

    }
    public function render()
    {
        return view('livewire.post.show', $this->loadPosts(), $this->loadCat());
    }
}
