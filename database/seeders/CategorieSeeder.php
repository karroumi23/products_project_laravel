<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        Categorie::create([
            'nom' => 'Laboratoire',
            'parent_id' => null,
        ]);

        Categorie::create([
            'nom' => 'Industriel',
            'parent_id' => null,
        ]);
    }

    
}