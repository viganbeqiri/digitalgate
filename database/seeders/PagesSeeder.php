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
                'title' => 'Desktop App Development',
                'slug' => 'desktop-app-development',
                'category_id' => 'services',
                'has_slider' => 1,
                'subtitle' => 'Desktop App Development pricing schedule',
                'contents' => '[{"title":"Enhanced Performance and Reliability","description":"Experience superior performance with our desktop app development. Designed for stability and speed, our apps ensure your business operations run smoothly, with or without internet connectivity.","image":"assets/uploads/services/icon/grid.png"},{"title":"Offline Accessibility","description":"Stay productive, even offline. Our desktop apps provide uninterrupted access to essential features, allowing your team to work efficiently in any environment, ensuring continuous business operation and data access","image":"assets/uploads/services/icon/screencast.png"},{"title":"Robust Security","description":"Secure your sensitive data with enhanced security features inherent in desktop applications. Our tailored security protocols safeguard your information from online vulnerabilities, offering peace of mind and protecting your business assets.","image":"assets/uploads/services/icon/pairing.png"}]',
                'slider_contents' => '[{"media_url":"assets/uploads/services/icon/grid.png","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'
            ],
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'category_id' => 'services',
                'has_slider' => 1,
                'subtitle' => 'web development pricing schedule',
                'contents' => '[{"title":"Enhanced Visibility and Reach","description":"Discover the power of global presence. Our website develooment ensures vour business is visible and accessible to a worldwide audience, 24/7, expanding your reach and customer base","image":"assets/uploads/services/icon/eye.png"},{"title":"Credibility and Professionalism","description":"Establish trust and professionalism with a sleek, custom-designed website. It\'s not just a site; it\'s the digital face of your company. showcasing your brand and building credibility among potential customers.","image":"assets/uploads/services/icon/screencast.png"},{"title":"Move Forward","description":"Stay Ahead in the Digital Race. Embrace innovation and avoid being left behind.","image":"assets/uploads/services/icon/pairing.png"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'Cross-Platform App',
                'slug' => 'cross-platform-development',
                'category_id' => 'services',
                'has_slider' => 1,
                'subtitle' => 'Ready to lunch something big? we can help you with that',
                'contents' => '[{"title":"Access from any device","description":"Experience freedom with our platform accesible from any device, anytime, anywhere, No apps, no hassle, just instant access at your fingertips","image":"assets/uploads/services/icon/grid.png"},{"title":"Consistent User Experience","description":"Our user-centric design ensures a familie where you periese","image":"https://placehold.co/400x400"},{"title":"Fast Deployment","description":"Rapid deployment, instant results.Your new platform ensures swift, streamlined launches, getting you up and running faster than ever before.","image":"https://placehold.co/400x400"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'category_id' => 'services',
                'has_slider' => 1,
                'subtitle' => 'Lets get your app up and running, No more execuse',
                'contents' => '[{"title":"Easy access","description":"Experience the convenience of immediate, user-friendly access to your services. Our mobile apps ensure that your business is just a tap away for your customers","image":"assets/uploads/services/icon/grid.png"},{"title":"Always Connected","description":"Stay engaged with your customers 24/7. Our mobile apps provide constant connectivity, ensuring your business remains active and accessible anytime, anywhere.","image":"assets/uploads/services/icon/screencast.png"},{"title":"Seamless Integration","description":"Your will have the same data across different devices. Enjoy a cohesive experience, whether on mobile, tablet, or desktop - your data is synchronized and consistent everywhere","image":"assets/uploads/services/icon/pairing.png"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'Design Service',
                'slug' => 'design-service',
                'category_id' => 'services',
                'has_slider' => 1,
                'subtitle' => 'Creating life',
                'contents' => '[{"title":"Brand Design and Identity","description":"Craft a lasting impression with DigitalGate\'s Brand Design and Identity|serices - where creatry meets strater to define and elevate your unique brand story","image":"assets/uploads/services/icon/stamp.png"},{"title":"UX/UI Design","description":"You like it when the flow of the app melts like butter.. right? Let us carve your digital interfaces with passion.","image":"assets/uploads/services/icon/id.png"},{"title":"Social Media and Marketing","description":"Engage and captivate with DigitalGate\'s Social Media and Marketing - where compelling content meets strategic outreach, turning your audience into a community of brand advocates","image":"assets/uploads/services/icon/instagram.png"}]',
                'slider_contents' => '[{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"},{"media_url":"https://placehold.co/1080x720","title":"test","subtitle":"tessss","link":"https://facebook.com"}]'

            ],
            [
                'title' => 'Team as a Service',
                'slug' => 'team-as-a-service',
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
