<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
        'name', 'parent_id'
    ];

    public function products()
    {
    	return $this->hasMany('App\Product');
    }

    public static function countChild($id)
    {
        return Category::where('parent_id', $id)->count();
    }

    public static function countParents()
    {
        return Category::where('parent_id', 0)->count();
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
