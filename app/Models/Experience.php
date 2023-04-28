<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    use HasFactory;

    protected $filable=[
        'jname',
        'cnname',
        'description',
        'currentj',
        'started_at',
        'finished_at',
        'sort' 
    ];
      

       
    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    
}
