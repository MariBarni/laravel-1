<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $filable=[
        'abschluss',  
        'bildungseinrichtung',
        'fachrichtung',
        'orth',
        'currente',
        'started_at',
        'finished_at',
        'sort'
    ];

   
    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    

}
