<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    
    public $table = "contracts";
	protected $fillable = ['investor_id', 'project_id', 'amount'];
	
    public function contract()
    {
        return $this->belongsTo(Project::class);
    }
}
