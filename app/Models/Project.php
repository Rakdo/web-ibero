<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

      protected $fillable =[
    	'user_id','name','description','final_date','hex'];


    	public function tareas() 
    	{
    		return $this->hasMany(Task::class);
    	}
}
