<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $group
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attribute whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Attribute extends Model
{
}
