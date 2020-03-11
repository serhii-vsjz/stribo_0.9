<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function Children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
