<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    
    use HasFactory;
    
    public $table = 'skills';

    protected $fillable=[
        'id',
        'skill'     
    ];
    protected $casts = [
        'tags' => 'array',
    ];

    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
