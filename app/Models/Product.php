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
        'tva',
        'prix_ttc',
        'stock',
        'image',
        'description',
        'categorie_id',
    ];

    // Calcul automatique prix_ttc avant sauvegarde
    protected static function booted(): void
    {
        static::saving(function (Product $product) {
            $product->prix_ttc = round(
                $product->prix * (1 + $product->tva / 100),
                2
            );
        });
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}