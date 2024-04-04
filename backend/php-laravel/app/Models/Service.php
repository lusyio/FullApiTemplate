<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 */

class Service extends Model
{
    use HasFactory;
}
