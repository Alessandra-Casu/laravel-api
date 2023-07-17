<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    public function category(){
        
        return $this->belongsTo(Category::class);
    }

    public function type(){
        
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        
        return $this->belongsToMany(Technology::class);
    }

    
}
