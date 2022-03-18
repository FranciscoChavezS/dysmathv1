<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected $allowIncluded = ['courses', 'courses.level'];

    //Relacion uno a muchos
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    public function scopeIncluded(Builder $query){

        if(empty($this->allowIncluded)||empty(request('included'))){
            return;
        }

        $relations = explode(',', request('included'));  //Acceder a una variable llamada include y muestre las relaciones

        $allowIncluded = collect($this->allowIncluded);

        foreach($relations as $key => $relationship){
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }
    
}
