<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portofolios = [
            [
                'title' => 'Enermak Energy Solution',
                'subtitle' => 'Branding identity and cross platform developer of enermark',
                'cover_image' => 'assets/uploads/portofolio/enermak.png',
                'slug' => 'enermak-energy-solution',
            ],
            [
                'title' => 'Support CCCA',
                'subtitle' => 'Cross-platform development of Association of Citizen, Support Center for Counseling children and Adolescents',
                'cover_image' => 'assets/uploads/portofolio/ccc.png',
                'slug' => 'support-ccca',
            ],
            [
                'title' => 'Cabej publishing house',
                'subtitle' => 'Website development for Cabej Publishing house, with integration of wordpress + eCommerce + cPay',
                'cover_image' => 'assets/uploads/portofolio/cabej.png',
                'slug' => 'cabej-publishing-house',
            ],
            [
                'title' => 'Costimate FZCO',
                'subtitle' => 'Branding identity and cross platform developer of Costimate FZCO. Incubator alumni',
                'cover_image' => 'assets/uploads/portofolio/costimate.png',
                'slug' => 'costimate-fzco',
            ]
        ];

        foreach ($portofolios as $portofolio) {
            \App\Models\Portofolio::updateOrCreate([
                'slug' => $portofolio['slug']
            ], $portofolio);
        }
    }
}
