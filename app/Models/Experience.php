<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function jobTitle():BelongsTo
    {
        return $this->belongsTo(Jobtitle::class);
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
