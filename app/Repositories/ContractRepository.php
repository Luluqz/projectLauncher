<?php

namespace App\Repositories;

use App\Project;
use App\User;
Use App\Contract;

class ContractRepository
{
    public function getAllContracts()
	{
        return Contract::all();
    }
    
    public function getContracts($project_id)
	{
        return Contract::where('project_id', $project_id)
                    ->get();
    }
    
    public function getCurrentAmount($project_id){
        return Contract::select('amount')
                    ->where('project_id', $project_id)
                    ->sum('amount');
    }
    
    public function getInvestorsId($project_id){
        return Contract::select('investor_id')
                    ->where('project_id', $project_id)
                    ->get();
    }
    
    public function getInvestors($investor_id){
        return User::where('id', $investor_id)
                ->get();
    }

    public function getTotalContracts($project_id){
        return Contract::where('project_id', $project_id)
                ->count();
    }
}