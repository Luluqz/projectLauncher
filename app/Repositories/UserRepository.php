<?php

namespace App\Repositories;

use App\User;
use App\Project;

class UserRepository
{

    public function getCreator($creator_id)
	{
        return User::where('id', $creator_id)
                    ->first();
    }

    public function getInvestor($investor_id)
    {
    	return User::where('id', $investor_id)
    				->first();
    }
}