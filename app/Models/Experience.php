<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    use HasFactory;

    public $table = 'experiences';
    

    protected $fillable=[
        'id',
        'jname',
        'cnname',
        'description',
        'currentj',
        'started_at',
        'finished_at',
        'sort' ,
        'profile_id'
    ];
    protected $casts = [
        'currentj' => 'boolean',
        'started_at' => 'date',
        'finished_at' => 'date',
    ];
      

       
    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    
}
