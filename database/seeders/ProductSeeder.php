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
                'category_id' => 'desktop-app-development',
                'page_id' => 'desktop-app-development',
                'name' => 'Visual Studio (.NET Framework)',
                'slug' => 'desktop-app-development-visual-studio-dotnet-framework',
                'subtitle' => 'Starting form',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'User Authentication and Authorization',
                    'Data Encryption and Security Measures',
                    'Resource and Project Management Features',
                    'Automated Workflows and Task Management',
                    'Offline Function and Syncing'
                ],
                'status' => 1,
                'price' => 199900,
                'parent_id' => null,
                'highlighted' => 0,
                'pricing_scheme' => 1,
                'type' => 1
            ],

            [
                'category_id' => 'desktop-app-development',
                'page_id' => 'desktop-app-development',
                'name' => 'Enchanced Security Add-on',
                'slug' => 'desktop-app-development-enchanced-security-addon',
                'subtitle' => 'Applicable for both Windows and Macos selection',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Cloud-based Data Storage and Backup',
                    'Multilingual Support',
                    'Two-Factor Authentication',
                    'Multi-modal backup system'
                ],
                'status' => 1,
                'price' => 3490,
                'parent_id' => null,
                'highlighted' => 1,
                'pricing_scheme' => 2,
                'type' => 1

            ],

            [
                'category_id' => 'desktop-app-development',
                'page_id' => 'desktop-app-development',
                'name' => 'Xcode (Swift)',
                'slug' => 'desktop-app-development-xcode-swift',
                'subtitle' => 'Advanced features such as e-commerce integration, custom graphics and interactive elements',
                'mandatory' => false,
                'description' => null,
                'additional_info' => [
                    'Unlimited',
                    '10GB Bandwidth',
                    '1 Domain, 1 Email *'
                ],
                'status' => 1,
                'price' => 199900,
                'parent_id' => null,
                'highlighted' => 0,
                'pricing_scheme' => 1,
                'type' => 1

            ],


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
                'type' => 1

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
                'pricing_scheme' => 1,
                'type' => 1

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
                'pricing_scheme' => 2,
                'type' => 1

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
                'image' => 'assets/uploads/services/android.png',
                'type' => 1

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
                'image' => 'assets/uploads/services/ios.png',
                'type' => 1

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
                'image' => 'assets/uploads/services/rn.png',
                'type' => 1

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
                'type' => 1

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
                'image' => 'assets/uploads/services/rn.png',
                'type' => 1

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
                'type' => 1

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
                'type' => 1

            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Brand Design and Identity',
                'slug' => 'design-service-brand-design-and-identity',
                'subtitle' => 'Design framework',
                'mandatory' => true,
                'description' => null,
                'additional_info' => [
                    '5 Days | 1 designer | 1 Kick-off meeting',
                ],
                'status' => 1,
                'price' => 9999,
                'parent_id' => null,
                'highlighted' => 0,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2
            ],

            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'UI/UX Design',
                'slug' => 'design-service-ui-ux-design',
                'subtitle' => 'Concept wireframe',
                'mandatory' => true,
                'description' => null,
                'additional_info' => [
                    '15 Days | 1 designer | 2 Kick-off meeting',
                ],
                'status' => 1,
                'price' => 30000,
                'parent_id' => null,
                'highlighted' => 0,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2

            ],

            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Social Media and Marketing',
                'slug' => 'design-service-social-media-and-marketing',
                'subtitle' => 'Brand Exposure alphabet',
                'mandatory' => true,
                'description' => null,
                'additional_info' => [
                    '15 Days | 1 designer | 2 Kick-off meeting',
                ],
                'status' => 1,
                'price' => 30000,
                'parent_id' => null,
                'highlighted' => 0,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2

            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Basic Logo and Branding Package',
                'slug' => 'design-service-basic-logo-and-branding-package',
                'subtitle' => 'Logo design, color scheme, and basic brand guidelines',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => 15000,
                'parent_id' => 'design-service-brand-design-and-identity',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2

            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Corporate Identity Package',
                'slug' => 'design-service-corporate-identity-package',
                'subtitle' => 'Builds on the basic package by adding business card design, letterhead, and email signature design.',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => 15000,
                'parent_id' => 'design-service-brand-design-and-identity',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2

            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Comprehensive Branding Solution',
                'slug' => 'design-service-comprehensive-branding-solution',
                'subtitle' => 'Expands further to include brochure design, packaging design, and a detailed brand guideline document.',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => 15000,
                'parent_id' => 'design-service-brand-design-and-identity',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2

            ],

            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Website Design',
                'slug' => 'design-service-website-design',
                'subtitle' => 'Tailored website UI/UX design, ensuring the site is not only visually engaging but also user-friendly and optimized for various devices.',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => 15000,
                'parent_id' => 'design-service-ui-ux-design',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2


            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Mobile App Design',
                'slug' => 'design-service-mobile-app-design',
                'subtitle' => 'Focused on creating user-friendly and visually appealing mobile app Interfaces, ensuring a seamiess user experience.',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => 55000,
                'parent_id' => 'design-service-ui-ux-design',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2

            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Brand Awarness Package',
                'slug' => 'design-service-brand-awarness-package',
                'subtitle' => 'Recreate social media accounts with rebranded company uniform to boost brand visibility',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => 9000,
                'parent_id' => 'design-service-social-media-and-marketing',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2

            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Engagement Booster Package',
                'slug' => 'design-service-engagement-booster-package',
                'subtitle' => 'Includes everything in the first package, plus creation and management of 5 posts per week on at least 3 platforms.',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => 55000,
                'parent_id' => 'design-service-social-media-and-marketing',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2

            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Full-Scale Digital Marketing Solution',
                'slug' => 'design-service-full-scale-digital-marketing-solution',
                'subtitle' => 'Combines all the above, adding targeted ad campaigns and analytics reporting for one month.',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => 105000,
                'parent_id' => 'design-service-social-media-and-marketing',
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 2

            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Video Advertisement Package',
                'slug' => 'design-service-video-advertisement-package',
                'subtitle' => 'Produce 2 professional-grade promotional videos.',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => null,
                'parent_id' => 'design-service-social-media-and-marketing',
                'highlighted' => 1,
                'pricing_scheme' => 3,
                'note' => null,
                'type' => 2

            ],
            [
                'category_id' => 'design-service',
                'page_id' => 'design-service',
                'name' => 'Influencer Collaboration Strategy',
                'slug' => 'design-service-influencer-collaboration-strategy',
                'subtitle' => 'Develop a plan for collaborating with influencers to expand reach and impact.',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => null,
                'parent_id' => 'design-service-social-media-and-marketing',
                'highlighted' => 1,
                'pricing_scheme' => 3,
                'note' => null,
                'type' => 2
            ],

            [
                'category_id' => 'incubator',
                'page_id' => 'incubation',
                'name' => 'Incubation chohort',
                'slug' => 'incubation-chohort',
                'subtitle' => 'Incubation',
                'mandatory' => false,
                'description' => null,
                'additional_info' => null,
                'status' => 1,
                'price' => 999,
                'parent_id' => null,
                'highlighted' => 1,
                'pricing_scheme' => 1,
                'note' => null,
                'type' => 3
            ],



        ];

        foreach ($products as $product) {
            $category = Category::where('slug', $product['category_id'])->first();
            if (!$category) {
                $this->command->info('Category not found: ' . $product['category_id']);
                continue;
            }
            $page = Page::where('slug', $product['page_id'])->first();
            if (!$page) {
                $this->command->info('Page not found: ' . $product['page_id']);
                continue;
            }
            $newProduct = Product::firstOrNew([
                'slug' => $product['slug']
            ]);
            if (!empty($product['parent_id'])) {
                $parent = Product::where('slug', $product['parent_id'])->first();
                if (!$parent) {
                    $this->command->info('Parent not found: ' . $product['parent_id']);
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
        }
    }
}
