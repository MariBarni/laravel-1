<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;
    public $table = 'educations';
 
    protected $fillable=[
        'id',
        'abschluss',  
        'bildungseinrichtung',
        'fachrichtung',
        'orth',
        'currente',
        'started_at',
        'finished_at',
        'sort',
        'profile_id'
    ];
    protected $casts = [
        'currente' => 'boolean',
        'started_at' => 'date',
        'finished_at' => 'date',
    ];

   
    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    

}
