<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class Show extends Component
{
    public $category_delete_id;
    public $sort_category='all', $search;
    use WithPagination;
    protected $paginationTheme='bootstrap';

    public function deleteConfirmation($id){
        $this->category_delete_id =$id;
    }

    public function deleteCategoryData(){
         $category = Category::where('id', $this->category_delete_id)->first();
        $category->delete();

        return redirect('/category')->with('message','Category Deleted Successfully');
        $this->category_delete_id ="";

    }
    public function loadCategories(){
        $query = Category::orderBy('category')->search($this->search);
        if($this->sort_category !='all'){
            $query->where('category', $this->sort_category);
        }
        $categories= $query->paginate(5);
        return compact('categories');
    }
    public function editConfirmation($id){
        $category = Category::findOrFail($id);
        $this->cat_id        = $id;
        $this->editCategory    = $category->category;
        $this->editRemarks     = $category->remarks;
    }

    public $cat_id;
    public function update()
    {
        $this->validate([
            'editCategory'     => 'required',
            'editRemarks'      => 'required',
        ]);

        $category = Category::find($this->cat_id);
        $category->update([
            'category'  => $this->editCategory,
            'remarks'   => $this->editRemarks,
        ]);

        return redirect('/category')->with('message', 'Updated Successfully');
    }



    public function render()
    {
        return view('livewire.categories.show', $this->loadCategories());
    }
}
