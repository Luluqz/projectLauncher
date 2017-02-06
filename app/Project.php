<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Project extends Model
{
    //use \Conner\Tagging\TaggableTrait;
    use Taggable;
    
	protected $fillable = ['creator_id', 'category_id', 'tag_id', 'title', 'description', 'img_path', 'project_cost', 'etat', 'project_endline', 'toTop'];

	protected $dates = ['created_at', 'updated_at','project_endline'];
	
    public function project()
    {
        return $this->belongsTo(User::class);
    }
}
