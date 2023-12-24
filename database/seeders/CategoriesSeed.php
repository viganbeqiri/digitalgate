<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'title' => 'Services',
                'slug' => 'services',
                'parent_id' => null,
            ],
            [
                'title' => 'Desktop App Development',
                'slug' => 'desktop-app-development',
                'parent_id' => 'services',
            ],
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'parent_id' => 'services',
            ],
            [
                'title' => 'Cross-Platform App',
                'slug' => 'cross-platform-app',
                'parent_id' => 'services',
            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'parent_id' => 'services',
            ],
            [
                'title' => 'Design Service',
                'slug' => 'design-service',
                'parent_id' => 'services',
            ],
            [
                'title' => 'Outsourcing',
                'slug' => 'outsourcing',
                'parent_id' => null,
            ],
            [
                'title' => 'Team as a Service',
                'slug' => 'team-as-a-service',
                'parent_id' => 'outsourcing',
            ],
            [
                'title' => 'IT Outsourcing Service',
                'slug' => 'it-outsourcing-service',
                'parent_id' => 'outsourcing',
            ],
            [
                'title' => 'Cybersecurity Service',
                'slug' => 'cybersecurity-service',
                'parent_id' => 'outsourcing',
            ]
        ];

        foreach ($contents as $content) {
            if ($content['parent_id'] == null) {
                $parent = Category::query()->firstOrNew(['slug' => $content['slug']]);
                $parent->title = $content['title'];
                $parent->slug = $content['slug'];
                $parent->save();
            } else {
                $cat = Category::query()->where('slug', $content['parent_id'])->first();
                if (!$cat) {
                    continue;
                }
                $child = $cat->childCategory()->firstOrNew(['slug' => $content['slug']]);
                $child->title = $content['title'];
                $child->slug = $content['slug'];
                $child->parent_id = $cat->id;
                $child->save();
            }
        }
    }
}
