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
 * @property array $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 */

class Block extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array',
    ];

    protected $fillable = [
        'name',
        'key',
        'content',
    ];

    public function contents()
    {
        return $this->hasMany(ContentElement::class);
    }
}
