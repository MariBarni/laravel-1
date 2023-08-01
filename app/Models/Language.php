<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Language extends Model
{
    use HasFactory;
    
    public $table = 'languages';

    protected $fillable=[
        'id',
        'language',
        'level',
        'profile_id'
    ];

    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
