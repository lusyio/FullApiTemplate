<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentElement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'block_id',
    ];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }
}
