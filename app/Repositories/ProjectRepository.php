<?php

namespace App\Repositories;

use App\User;
use App\Project;
use App\Category;

class ProjectRepository
{

    public function getAllProjectsPagi()
	{
        return Project::orderBy('id','desc')->Paginate(6);
    }

    public function getAllProjects(){
        return Project::inRandomOrder()->all();
    }
    
    public function getProject($project_id){
        return Project::where('id', $project_id)
                        ->first();
    }

    public function getProjectsFromCategory($category_id){
    	return Project::where('category_id', $category_id)
    					->inRandomOrder()
    					->get();
    }

    public function getTopProjectsFromCategory($category_id){
    	return Project::where([
    			['category_id', $category_id],
    			['toTop', '1'],
    		])->get();
    					
    }

    public function getRandomTopProjectFromCategory($category_id)
    {
    	return Project::where([
    			['category_id', $category_id],
    			['toTop', '1'],
    		])->inRandomOrder()->first();   	
    }

    public function getUserProjects($user_id)
    {
        return Project::where('creator_id', $user_id)->get();
    }

}