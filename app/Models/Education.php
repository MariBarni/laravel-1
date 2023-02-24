<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function institution():BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }


}
