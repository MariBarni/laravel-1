<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    public $table = 'profiles';
  
   
    protected $fillable=[
        'id',
        'name',
        'vorname',
        'wunschposition',
       'email',
       'handynummer',
        'geburtstag',
        'geburtsort',
        'straße',
        'plz',
        'ort',
        'land',
       'profileimg',
       'templa',
       'tags'
    ];
    
    protected $casts = [
        'tags' => 'array',
        'experiences' => 'array',
        'educations' => 'array',
        //'languages' => 'array',
        'skills'=> 'array'
    ];
  
 
     
   

    public function experiences():HasMany
    {
        return $this->hasMany(Experience::class);
    }

 
    public function educations():HasMany
    {
        return $this->hasMany(Education::class);
    }
 
    public function languages():HasMany
    {
        return $this->hasMany(Language::class);
    }
    public function skills():HasMany
    {
        return $this->hasMany(Skill::class);
    }

 
    
  
}

