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
        if(!is_null($top1)){
            $user1 = $this->user->getCreator($top1->creator_id);
            $currentAmount1 = $this->contract->getCurrentAmount($top1->id);
            $daysLeft1 = $top1->project_endline->diffInDays($top1->created_at);
        }else{
            $user1=0;
            $currentAmount1=0;
            $daysLeft1=0;
        }
        $categories = $this->category->getAllCategories();
   
        if(!is_null($top1)){
            if($top1->project_cost > $currentAmount1){
                $perc1 = ($currentAmount1 / $top1->project_cost)*100;
            }else{
                $perc1 = 100;
            }
        }else{
            $perc1 = 0;
        }


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
            'user1' => $user1,
            'currentAmount1' => $currentAmount1,
            'perc1' => $perc1,
            'daysLeft1' => $daysLeft1,
            'categories' => $categories,

            ]);
    }

    public function account(Request $request)
    {
        $user = Auth::user();
        $projects = $this->project->getUserProjects($user->id);

        foreach($projects as $key => $project){

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

            $project_contrats[$key] = $this->contract->getContracts($project->id);

            foreach ($project_contrats[$key] as $k => $c) {
                $investors[$key][$k] = $this->contract->getInvestors($c->investor_id);
            }
        }

        // dd($investors);

        return view('account', [
            'user' => $user,
            'projects' => $projects,
            'currentAmount' => $currentAmount,
            'perc' => $perc,
            'project_contracts' => $project_contrats,
            'investors' => $investors,
            ]);
    }
}
