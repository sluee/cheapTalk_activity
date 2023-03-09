<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function scopeSearch($query, $terms)
    {
        collect(explode(" ",$terms))
        ->filter()
        ->each(function($term) use ($query){
            $term ="%" .$term .'%';

            $query->where('author', 'like', $term)
                    ->orWhere('title', 'like',$term);


        });
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'cat_id', 'id');
    }
}
