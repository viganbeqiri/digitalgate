<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'name' => 'Vigan Beqiri',
                'position' => 'Advisory Board',
                'image' => 'assets/uploads/team/vigan.png',
            ],
            [
                'name' => 'Loubna Al Gharaffi',
                'position' => 'Advisory Board',
                'image' => 'assets/uploads/team/loubna.png',
            ],
            [
                'name' => 'Christoffer Lenart Johanssen',
                'position' => 'Advisory Board',
                'image' => 'assets/uploads/team/christoffer.png',
            ],
            [
                'name' => 'Edi Sain',
                'position' => 'Team Lead, Full Stack',
                'image' => 'assets/uploads/team/edi.png',
            ],
            [
                'name' => 'Bena Beqiri',
                'position' => 'Head of Design and Marketing',
                'image' => 'assets/uploads/team/bena.png',
            ],
            [
                'name' => 'Ace Bogdanovski',
                'position' => 'Front End Developer',
                'image' => 'assets/uploads/team/ace.png',
            ],
            [
                'name' => 'Blendi Sabriu',
                'position' => 'DevOps Engineer',
                'image' => 'assets/uploads/team/blendi.png',
            ],

            [
                'name' => 'Simone Cambi',
                'position' => 'UX/UI Designer',
                'image' => 'assets/uploads/team/simone.png',
            ],

            [
                'name' => 'Amine Seidi',
                'position' => 'Back End Developer',
                'image' => 'assets/uploads/team/amine.png',
            ],

        ];

        foreach ($teams as $team) {
            \App\Models\Team::updateOrCreate(['name' => $team['name']], $team);
        }
    }
}
