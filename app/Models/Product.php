<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prix',
        'stock',
        'image',
        'description',
        'categorie_id', // ⚠️ IMPORTANT: you are missing this
    ];

    public function categorie()
{
    return $this->belongsTo(Categorie::class);
}

}