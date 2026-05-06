<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label',
        'enabled',
        'order',
        'content',
    ];

    protected $casts = [
        'content' => 'array',  // ← هذا هو الحل
        'enabled' => 'boolean',
    ];
}