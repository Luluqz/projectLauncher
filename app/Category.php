<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public $table = "projects_categories";
	protected $fillable = ['name'];
	
    public function category()
    {
        return $this->belongsTo(Project::class);
    }
}
