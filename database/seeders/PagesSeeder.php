<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'title' => 'Destop App Development',
                'slug' => 'destop-app-development',
                'category_id' => 'services',
                'has_slider' => 1,
                'contents' => '[{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'
            ],
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'category_id' => 'services',
                'has_slider' => 1,
                'contents' => '[{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'Cross-Platform App',
                'slug' => 'cross-platform-app',
                'category_id' => 'services',
                'has_slider' => 1,
                'contents' => '[{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'category_id' => 'services',
                'has_slider' => 1,
                'contents' => '[{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'Design Service',
                'slug' => 'design-service',
                'category_id' => 'services',
                'has_slider' => 1,
                'contents' => '[{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'Team as Service',
                'slug' => 'team-as-service',
                'category_id' => 'outsourcing',
                'has_slider' => 1,
                'contents' => '[{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'IT Outsourcing Service',
                'slug' => 'it-outsourcing-service',
                'category_id' => 'outsourcing',
                'has_slider' => 1,
                'contents' => '[{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'Cybersecurity Service',
                'slug' => 'cybersecurity-service',
                'category_id' => 'outsourcing',
                'has_slider' => 1,
                'contents' => '[{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"},{"title":"test","description":"test","image":"https://placehold.co/400x400"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ]
        ];

        foreach ($contents as $content) {
            $this->command->info('Create page ' . $content['slug']);

            $category = Category::where('slug', $content['category_id'])->first();
            unset($content['category_id']);
            if (empty($category)) {
                continue;
            }
            $category->pages()->updateOrCreate(['slug' => $content['slug']], $content);
        }
    }
}
