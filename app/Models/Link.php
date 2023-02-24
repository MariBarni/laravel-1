<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
