<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cost extends Model
{
    public function prices(): BelongsToMany
    {
        return $this->belongsToMany(Price::class);
    }
}
