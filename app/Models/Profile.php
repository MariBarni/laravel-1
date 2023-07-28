<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;


class Profile extends Model
{
    use HasFactory;
    protected  static  function  boot(){
    parent::boot();    
    static::creating(function  ($model)  {
        $model->token = (string) Str::uuid();
    });
    }

    public $table = 'profiles';
  
   
    protected $fillable=[
        'id',
        'token',
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
        'languages' => 'array',
        
    ];
  
 
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'email', 'owner_key');
    } 
   

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
  
 
    
  
}

