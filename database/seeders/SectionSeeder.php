<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        Section::truncate();

        Section::create([
            'name'    => 'hero',
            'label'   => 'Section Hero',
            'enabled' => true,
            'order'   => 1,
            'content' => [
                'badge_text'          => 'Qualité & Précision',
                'title_main'          => 'Solutions Professionnelles pour',
                'title_highlight'     => 'Laboratoire',
                'title_suffix'        => '& Industrie',
                'subtitle'            => 'Découvrez nos produits de qualité, équipements spécialisés et services adaptés à vos besoins professionnels.',
                'btn_primary_text'    => 'Voir les Produits',
                'btn_primary_url'     => '/products',
                'btn_secondary_text'  => 'Nos Services',
                'btn_secondary_url'   => '/services',
                'stat1_number'        => '500+',
                'stat1_label'         => 'Produits',
                'stat2_number'        => '20+',
                'stat2_label'         => "Années d'exp.",
                'stat3_number'        => '100%',
                'stat3_label'         => 'Certifié',
            ],
        ]);

        Section::create([
            'name'    => 'partners',
            'label'   => 'Partenaires Exclusifs',
            'enabled' => true,
            'order'   => 2,
            'content' => [
                'title' => 'Partenaires Exclusifs',
                'partners' => [
                    ['name' => 'Tinius Olsen', 'logo' => 'images/partners/tinius.png'],
                    ['name' => 'Leica',        'logo' => 'images/partners/leica.png'],
                    ['name' => 'PRESI',        'logo' => 'images/partners/presi.png'],
                    ['name' => 'Climats',      'logo' => 'images/partners/climats.png'],
                ],
            ],
        ]);

        Section::create([
            'name'    => 'services',
            'label'   => 'Nos Services',
            'enabled' => true,
            'order'   => 3,
            'content' => [
                'title'    => 'Nos Services',
                'subtitle' => 'Des solutions adaptées à vos besoins',
                'services' => [
                    ['icon' => 'bi-tools',        'title' => 'Maintenance',      'description' => 'Service de maintenance préventive et corrective.'],
                    ['icon' => 'bi-truck',         'title' => 'Livraison',        'description' => 'Livraison rapide partout au Maroc.'],
                    ['icon' => 'bi-headset',       'title' => 'Support',          'description' => 'Support technique disponible 6j/7.'],
                    ['icon' => 'bi-patch-check',   'title' => 'Certification',    'description' => 'Produits certifiés et conformes aux normes.'],
                ],
            ],
        ]);
    }
}