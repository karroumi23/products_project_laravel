<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'parent_id',
    ];

    // Parent category (Laboratoire / Industriel)
    public function parent()
    {
        return $this->belongsTo(Categorie::class, 'parent_id');
    }

    // Child categories (Métrologie, ESD, etc.)
    public function enfants()
    {
        return $this->hasMany(Categorie::class, 'parent_id');
    }

    // Products inside this category
    public function products()
    {
        return $this->hasMany(Product::class, 'categorie_id');
    }
}