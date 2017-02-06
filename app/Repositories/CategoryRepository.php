<?php

namespace App\Repositories;

use App\Project;
use App\Category;

class CategoryRepository
{

    public function getCategory($category_id)
	{
        return Category::select('name')
                    ->where('id', $category_id)
                    ->first();
    }
    
    public function getAllCategories()
	{
        return Category::all();
    }

}