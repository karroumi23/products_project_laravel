<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


     public function run(): void
     {
         // MAIN CATEGORIES (no duplicates)
         $laboratoire = Categorie::firstOrCreate(
             ['nom' => 'Laboratoire', 'parent_id' => null]
         );

         $industriel = Categorie::firstOrCreate(
             ['nom' => 'Industriel', 'parent_id' => null]
         );

         // LABORATOIRE CHILDREN
         $laboratoireChildren = [
             'Inspection et microscopie',
             'Métallographie',
             'Essai mécanique',
             'Simulation climatique',
             'Métrologie',
         ];

         foreach ($laboratoireChildren as $name) {
             Categorie::firstOrCreate([
                 'nom' => $name,
                 'parent_id' => $laboratoire->id,
             ]);
         }

         // INDUSTRIEL CHILDREN
         $industrielChildren = [
             'Equipement Salle Blanche',
             'Equipement ESD',
             'Filter à air',
             'Mesures industrielles',
             'Solutions de refroidissement',
             "traitement d'air",
         ];

         foreach ($industrielChildren as $name) {
             Categorie::firstOrCreate([
                 'nom' => $name,
                 'parent_id' => $industriel->id,
             ]);
         }
     }
}
