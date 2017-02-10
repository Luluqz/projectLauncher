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

class ProjectDetailsController extends Controller
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
    public function index(Request $request, $project_id)
    {
        // get project
        $project = $this->project->getProject($project_id);
        
        // get creator of project
        $user = $this->user->getCreator($project->creator_id);
        
        // get category project
        $category = $this->category->getCategory($project->category_id);
        
        // get currentAmount
        $currentAmount = $this->contract->getCurrentAmount($project_id);
        
        //get investors
        $listContract = $this->contract->getContracts($project_id);
        $investors = [];
        foreach($listContract as $key => $contract){
             // get investors id
             $investors[$key] = $this->contract->getInvestors($contract->investor_id);

             //get financement
             //$financement[$key] = $this->contract->getAmount()
        }

        //days left
        $daysLeft = $project->project_endline->diffInDays($project->created_at);

        //pourcentage
        if($project->project_cost > $currentAmount){
            $perc = ($currentAmount / $project->project_cost)*100;
        }else{
            $perc = 100;
        }

        //financements
        $totalContracts = $this->contract->getTotalContracts($project->id);

        
        return view('projectDetails', [
            'project' => $project,
            'user' => $user,
            'category' => $category,
            'currentAmount' => $currentAmount,
            'investors' => $investors,
            'contracts' => $listContract,
            'daysLeft' => $daysLeft,
            'perc' => $perc,
            'financements' => $totalContracts,
            'listContracts' => $listContract,
            ]);
    }
}
