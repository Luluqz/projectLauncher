<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Project;
use App\Repositories\CategoryRepository;
use App\Repositories\ProjectRepository;
use Input;
use Session;
Use File;
use Illuminate\Support\Facades\Redirect;

class CreateController extends Controller
{
    public function __construct(CategoryRepository $category, ProjectRepository $project)
    {
        $this->middleware('auth');
        $this->category = $category;
        $this->project = $project;
    }
    
    public function index(Request $request){
        
        $category = $this->category->getAllCategories();
        
        //$project = Project::with('tagged')->first(); // eager load
        //$project->tag('Gardening'); // attach the tag
        
        //$project = Project::create([]);
        //$project->tag(explode(',', $request->tags));
        
        $tags = Project::existingTags()->pluck('name');

        return view('create', [
                'categories' => $category,
                'tags' => $tags,
            ]);
    }

    public function addProject(Request $Request){

        $imageTempName = $Request->file('input-file-preview')->getPathname();
        $imageName = $Request->file('input-file-preview')->getClientOriginalName();

        $project = new Project;

        $project->creator_id = Input::get('user_id');
        $project->title = Input::get('name');
        $project->description = Input::get('desc');
        $project->project_cost = Input::get('cost');
        $project->project_endline = Input::get('end');
        $project->category_id = Input::get('category_id');
        $project->img_path = $imageName;

        $project->save();

        $file = $Request->file('input-file-preview');
        $destinationPath = base_path() . '/public/uploads/img/';
        $Request->file('input-file-preview')->move($destinationPath , $imageName);

        Session::flash('message', 'Project uploaded');
        return Redirect::to('/home/create');
    }
}
