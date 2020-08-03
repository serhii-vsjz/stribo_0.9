<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Markup extends Model
{
    public function getValue()
    {
        return $this->value;
    }
}
