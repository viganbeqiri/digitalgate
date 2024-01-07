<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncubatorContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $whyUs = [
            [
                'title' => 'Mentorship and Networking Program',
                'description' => 'Learn from the ones who walked your path before. Leverage from our international networking platform',
                'media_url' => 'assets/uploads/incubation/networking.png',
            ],
            [
                'title' => 'Infrastructure Support',
                'description' => 'Provide startups with access to cutting-edge technological resources and support. This could include software development tools, cloud services, and technical expertise to help them develop, test, and deploy',
                'media_url' => 'assets/uploads/incubation/infrastructure.png',
            ],
            [
                'title' => 'Funding Support',
                'description' => 'Funding Support and Equity-Based Collaboration. At DigitalGate, were committed to fueling the growth of startups through direct funding support. Recognizing the challenges of securing capital, we offer al unique proposition where startups receive the necessary funding without upfront costs. Instead, we engage in an equity-based collaboration, where we obtain a proportional stake in the startup.',
                'media_url' => 'assets/uploads/incubation/funding.png',
            ]
        ];
    }
}
