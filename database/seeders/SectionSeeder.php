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

        Section::where('name', 'services')->update([
            'content' => [
                'title'    => 'Nos Services',
                'subtitle' => 'Des solutions adaptées à vos besoins',
                'services' => [
                    [
                        'icon'        => 'bi-gear-fill',
                        'title'       => 'Installation et mise en marche',
                        'description' => "Profitez de notre service d'installation et de mise en marche assuré par nos techniciens expérimentés. Nous vous garantissons une configuration optimale sans aucun souci, vous permettant de démarrer en toute tranquillité. Faites confiance à notre équipe qualifiée pour une installation réussie de vos équipements.",
                    ],
                    [
                        'icon'        => 'bi-mortarboard-fill',
                        'title'       => 'Formation produit',
                        'description' => "Elle vise à familiariser les participants avec leur utilisation efficace et sûre, en couvrant les caractéristiques, les consignes de sécurité, l'installation, le fonctionnement et la maintenance. L'objectif est d'autonomiser les utilisateurs pour maximiser la productivité et minimiser les risques.",
                    ],
                    [
                        'icon'        => 'bi-headset',
                        'title'       => 'Assistance technique',
                        'description' => "Bénéficiez de notre assistance technique complète, comprenant l'intervention de nos techniciens en cas de panne, que ce soit pendant ou en dehors de la période de garantie. Notre équipe de techniciens qualifiés est disponible pour résoudre rapidement tout problème technique rencontré avec nos produits.",
                    ],
                    [
                        'icon'        => 'bi-box-seam-fill',
                        'title'       => 'Disponibilité de stock',
                        'description' => "Nous avons en stock une variété de pièces de rechange et de consommables pour répondre à vos besoins. Que ce soit pour remplacer des composants défectueux ou pour assurer la disponibilité des consommables nécessaires, nous sommes là pour vous fournir les pièces adéquates.",
                    ],
                ],
            ],
        ]);


    }
}