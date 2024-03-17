<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Block
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property mixed $template
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 */

class Block extends Model
{
    use HasFactory;
}
