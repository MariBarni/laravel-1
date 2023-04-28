<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;
    protected $filable=[
        'name',
        'vorname',
        'wunschposition',
       'e-mail',
       'handynummer',
        'geburtstag',
        'geburtsort',
        'straße',
        'plz',
        'ort',
        'land',
       'profileimg',
       'token',
       'template'
    ];
    
     
   

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

 
    public function educations():HasMany
    {
        return $this->hasMany(Education::class);
    }
    public function skills():HasMany
    {
        return $this->hasMany(Skill::class);
    }
    public function languages():HasMany
    {
        return $this->hasMany(Language::class);
    }
 
    
  
}

