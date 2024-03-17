<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PageBlock
 *
 * @property int $id
 * @property int $page_id
 * @property int $block_id
 * @property string $key
 * @property mixed $data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 */
class PageBlock extends Model
{
    use HasFactory;
}
