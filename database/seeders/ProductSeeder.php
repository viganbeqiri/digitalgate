<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 'web-development',
                'page_id' => 'web-development',
                'name' => 'Basic Plan',
                'slug' => 'web-development-basic-plan',
                'subtitle' => 'starter website package',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Wordpress Installation', '10GB Bandwidth', '1 Domain, 1 Email *'
                ],
                'status' => 1,
                'price' => 5900,
                'parent_id' => null,
                'highlighted' => 0,
                'pricing_scheme' => 1,
            ],
            [
                'category_id' => 'web-development',
                'page_id' => 'web-development',
                'name' => 'premium plan',
                'slug' => 'web-development-premium-plan',
                'subtitle' => 'Ideal for small business or individual just starting out',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Custom design + user friendly CMS',
                    'Up to 15 pages',
                    'enchanced SEO features',
                    'Unlimited bandwidth',
                    '1 domain, 5 Email *'
                ],
                'status' => 1,
                'price' => 14900,
                'parent_id' => null,
                'highlighted' => 1,
                'pricing_scheme' => 1
            ],
            [
                'category_id' => 'web-development',
                'page_id' => 'web-development',
                'name' => 'Business plan',
                'slug' => 'web-development-business-plan',
                'subtitle' => 'Advanced features such as e-comerce integragion, custom graphic, and interactive elements',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Unlimited',
                    '10 GB Bandwidth',
                    '1 domain, 100 Email *'
                ],
                'status' => 1,
                'price' => 14900,
                'parent_id' => null,
                'highlighted' => 0,
                'pricing_scheme' => 2
            ],

            [
                'category_id' => 'mobile-app-development',
                'page_id' => 'mobile-app-development',
                'name' => 'Adasi Plan',
                'slug' => 'mobile-app-development-adasi-plan',
                'subtitle' => '(Android Development)',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Using Android native technologies such as Kotlin and Java',
                    'Custom Android UI/UX design',
                    'Google API Integration'
                ],
                'status' => 1,
                'price' => 200000,
                'parent_id' => null,
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => 'Ideal for bussiness focusing exclusively on the Android market, laveraging the platform\'s widespread reach',
                'image' => 'assets/uploads/services/android.png'
            ],
            [
                'category_id' => 'mobile-app-development',
                'page_id' => 'mobile-app-development',
                'name' => 'Epi Plan',
                'slug' => 'mobile-app-development-epi-plan',
                'subtitle' => '(IOS Development)',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Swift and Objective-C for IOS development',
                    'Integration with Apple\'s Ecosystem including SiriKit, HealtKit, and more',
                    'Advanced IOS-Spesific functionalities',
                    'Security feature such as face-id and fingerprint integration seamless integration'
                ],
                'status' => 1,
                'price' => 249000,
                'parent_id' => null,
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => 'Tailored for business aiming to tap into the premium IOS user base with high-end features shopificated applications',
                'image' => 'assets/uploads/services/ios.png'
            ],
            [
                'category_id' => 'mobile-app-development',
                'page_id' => 'mobile-app-development',
                'name' => 'Halcon Plan',
                'slug' => 'mobile-app-development-halcon-plan',
                'subtitle' => '(Unified code, deployed on both IOS adnd Android)',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Built on Reach native, allowing for simulatenous deployment on both Android and IOS platforms with single codebase',
                    'Native-like peformance, and cost effective development process',
                    'Hot Reloading',
                    'Large Comunity and Ecosystem',
                    'Access to native APIs',
                    'Customizable UI/UX',
                ],
                'status' => 1,
                'price' => 449000,
                'parent_id' => null,
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'image' => 'assets/uploads/services/rn.png'
            ],

            [
                'category_id' => 'cross-platform-development',
                'page_id' => 'cross-platform-development',
                'name' => 'Discovery Phase*',
                'slug' => 'cross-platform-development-discovery-phase',
                'subtitle' => 'In-depth analyst of your idea and writing the business statement, canvasing the plan and allocation the resource',
                'mandatory' => true,
                'description' => null,
                'additional_info' => [
                    '30 days',
                    '3 members',
                    'Pre kick-off and Kick-off meeting',
                ],
                'status' => 1,
                'price' => 99000,
                'parent_id' => null,
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
            ],

            [
                'category_id' => 'mobile-app-development',
                'page_id' => 'mobile-app-development',
                'name' => 'Halcon Plan',
                'slug' => 'mobile-app-development-halcon-plan',
                'subtitle' => '(Unified code, deployed on both IOS adnd Android)',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Built on Reach native, allowing for simulatenous deployment on both Android and IOS platforms with single codebase',
                    'Native-like peformance, and cost effective development process',
                    'Hot Reloading',
                    'Large Comunity and Ecosystem',
                    'Access to native APIs',
                    'Customizable UI/UX',
                ],
                'status' => 1,
                'price' => 449000,
                'parent_id' => null,
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'image' => 'assets/uploads/services/rn.png'
            ],

            [
                'category_id' => 'cross-platform-development',
                'page_id' => 'cross-platform-development',
                'name' => 'Edge Plan',
                'slug' => 'cross-platform-development-edge-plan',
                'subtitle' => 'Idea for small business or individual just starting out',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Essensial cross-platform app functionalities suitable for startup or small business',
                    'UI/UX design, standart app feature like user login, profile management, and basic analyst',
                    'Basic support and maintenance for 1 Year guaranted uptime',
                    'Up to 15 pages, Enchanced SEO features',
                    'unlimited bandwidth',
                    '1 Domain, 10 email accounts'
                ],
                'status' => 1,
                'price' => 60000,
                'parent_id' => 'cross-platform-development-discovery-phase',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
            ],
            [
                'category_id' => 'cross-platform-development',
                'page_id' => 'cross-platform-development',
                'name' => 'Earth Plan',
                'slug' => 'cross-platform-development-earth-plan',
                'subtitle' => 'Advanced features such as e-commerce integration, custom gprahics, and interactive elements',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Advanced Ul/UX design',
                    'E-commerce integration',
                    'Push notifications',
                    'Custom API integration',
                    'Compatible across multiple platforms, including IOS, Android',
                    'It\'s geared towards established businesses or those needing a more complex app',
                    'Extended Support and Ongoing Updates for 1 Year - Dedicated Hot Desk.',
                    'Dedicated workspace. Unlimited email accounts.'
                ],
                'status' => 1,
                'price' => 149000,
                'parent_id' => 'cross-platform-development-discovery-phase',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
            ],


        ];

        foreach ($products as $product) {
            $category = Category::where('slug', $product['category_id'])->first();
            if (!$category) {
                continue;
            }
            $page = Page::where('slug', $product['page_id'])->first();
            if (!$page) {
                continue;
            }
            $newProduct = Product::firstOrNew([
                'slug' => $product['slug']
            ]);
            if (!empty($product['parent_id'])) {
                $parent = Product::where('slug', $product['parent_id'])->first();
                if (!$parent) {
                    continue;
                }
                $newProduct->parent_id = $parent->id;
            }

            $newProduct->category_id = $category->id;
            $newProduct->page_id = $page->id;
            $newProduct->additional_info = json_encode($product['additional_info']);

            unset($product['category_id']);
            unset($product['page_id']);
            unset($product['additional_info']);
            unset($product['parent_id']);
            $newProduct->fill($product);
            $newProduct->save();
            $this->command->info('Creating product: ' . $newProduct);
        }
    }
}
