<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Project;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ContractRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProjectRepository $project, UserRepository $user, CategoryRepository $category, ContractRepository $contract)
    {
        //$this->middleware('auth');
        $this->project = $project;
        $this->user = $user;
        $this->category = $category;
        $this->contract = $contract;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $listProject = $this->project->getAllProjectsPagi();
        $categories = $this->category->getAllCategories();
        
        foreach($listProject as $key => $project){
             // get creator of project
             $user[$key] = $this->user->getCreator($project->creator_id);
             
             // get category of project
             $category[$key] = $this->category->getCategory($project->category_id);

             // get currentAmount
             $currentAmount[$key] = $this->contract->getCurrentAmount($project->id);

             //get percentage
            if(!is_null($currentAmount[$key])){
                if($project->project_cost > $currentAmount[$key]){
                    $perc[$key] = ($currentAmount[$key] / $project->project_cost)*100;
                }else{
                    $perc[$key] = 100;
                }
            }else{
                $perc[$key] = 0;
            }
        }

        //top projects
        foreach ($categories as $key => $v) {
            //get one random top project from each category
            $topHome[$key] = $this->project->getRandomTopProjectFromCategory($key+1);

            //get creator
            if (!is_null($topHome[$key])){
                $topUser[$key] = $this->user->getCreator($topHome[$key]->creator_id);
            }

            //get currentAmount
            if (!is_null($topHome[$key])){
                $topCurrentAmount[$key] = $this->contract->getCurrentAmount($topHome[$key]->id);
                if(!is_null($topCurrentAmount[$key])){
                    if($topHome[$key]->project_cost > $topCurrentAmount[$key]){
                        $percentage[$key] = ($topCurrentAmount[$key] / $topHome[$key]->project_cost)*100;
                    }else{
                        $percentage[$key] = 100;
                    }
                }else{
                    $percentage[$key] = 0;
                }
            }   
            
            //get total investors per project
            if (!is_null($topHome[$key])){
                $totalContracts[$key] = $this->contract->getTotalContracts($topHome[$key]->id);
            } 

            //get days left
            if (!is_null($topHome[$key])){
                $daysLeft[$key] = $topHome[$key]->project_endline->diffInDays($topHome[$key]->created_at);
                //dd($daysLeft[$key]);
            }       
        }

        if ($request->ajax()) {
            return view('load', ['projects' => $listProject, 
                                 'user' => $user,
                                 'category' => $category,
                                 'perc' => $perc ])->render();  
        }
        
        return view('home', [
            'projects' => $listProject,
            'user' => $user,
            'category' => $category,
            'categories' => $categories,
            'topHome' => $topHome,
            'currentAmount' => $currentAmount,
            'topUser' => $topUser,
            'topCurrentAmount' => $topCurrentAmount,
            'percentage' => $percentage,
            'totalContracts' => $totalContracts,
            'daysLeft' => $daysLeft,
            'perc' => $perc,
            ]);
    }

    public function category(Request $request, $category_id)
    {

        $listProject = $this->project->getProjectsFromCategory($category_id);
        $category = $this->category->getCategory($category_id);
        $top1 = $this->project->getRandomTopProjectFromCategory($category_id);

        foreach($listProject as $key => $project){
             // get creator of project
             $user[$key] = $this->user->getCreator($project->creator_id);

             // get currentAmount
             $currentAmount[$key] = $this->contract->getCurrentAmount($project->id);

             //get percentage
            if(!is_null($currentAmount[$key])){
                if($project->project_cost > $currentAmount[$key]){
                    $perc[$key] = ($currentAmount[$key] / $project->project_cost)*100;
                }else{
                    $perc[$key] = 100;
                }
            }else{
                $perc[$key] = 0;
            }
        }

        return view('category', [
            'projects' => $listProject,
            'category' => $category,
            'top1' => $top1,
            'user' => $user,
            'currentAmount' => $currentAmount,
            'perc' => $perc,
            ]);
    }
}
