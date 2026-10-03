<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Marketplace\Domain\Models\Store;
use App\Modules\Marketplace\Domain\Models\StoreCatalog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MarketplaceStoreSeeder extends Seeder
{
    public function run(): void
    {
        $stores = [
            [
                'email' => 'merchant@zarah.app',
                'store_name' => 'شركة الخير للمستلزمات والمبيدات الزراعية',
                'store_type' => 'تجارة تجزئة وجملة',
                'description' => 'المتجر الرائد في توفير البذور الزراعية المعتمدة، الأسمدة العضوية والكيميائية، والمبيدات الوقائية ذات الكفاءة العالية لمزارعي اليمن.',
                'address' => 'صنعاء - سوق شعوب الزراعي - جوار جولة النصر',
                'latitude' => 15.3850,
                'longitude' => 44.2180,
                'rating' => 4.9,
                'logo_url' => 'https://images.unsplash.com/photo-1560493676-04071c5f467b?auto=format&fit=crop&w=300&q=80',
                'cover_url' => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=1200&q=80',
                'catalogs' => [
                    ['name' => 'بذور ومحاصيل بلدية', 'description' => 'تقاوي ذرة وقمح وبطاطس مختارة بعناية'],
                    ['name' => 'أسمدة ومخصبات تربة', 'description' => 'مركبات NPK وهيوميك ومخصبات عضوية مرخصة'],
                    ['name' => 'مبيدات ووقاية نباتية', 'description' => 'حلول متكاملة لمكافحة الآفات الفطرية والحشرية'],
                ],
            ],
            [
                'email' => 'albaraka@zarah.app',
                'store_name' => 'مؤسسة البركة لأنظمة الطاقة والري الحديث',
                'store_type' => 'وكيل معتمد وموزع',
                'description' => 'متخصصون في توريد وتركيب منظومات الطاقة الشمسية للآبار الارتوازية، الغطاسات الإيطالية، وشبكات الري بالتنقيط ذات الجودة العالية.',
                'address' => 'صنعاء - شارع الستين الجنوبي - مقابل فندق بابل',
                'latitude' => 15.3340,
                'longitude' => 44.1780,
                'rating' => 4.8,
                'logo_url' => 'https://images.unsplash.com/photo-1509391365360-2e959784a276?auto=format&fit=crop&w=300&q=80',
                'cover_url' => 'https://images.unsplash.com/photo-1508873696983-2df57046475a?auto=format&fit=crop&w=1200&q=80',
                'catalogs' => [
                    ['name' => 'منظومات الطاقة الشمسية للآبار', 'description' => 'إينفرترات وألواح عالية الكفاءة'],
                    ['name' => 'شبكات وليات الري بالتنقيط', 'description' => 'مواسير، فلاتر، وليات GR معتمدة'],
                ],
            ],
            [
                'email' => 'sahool.ibb@zarah.app',
                'store_name' => 'مشاتل سحول إب الخضراء',
                'store_type' => 'مشاتل ومحاصيل مثمرة',
                'description' => 'أكبر مشتل زراعي في محافظة إب لإنتاج شتلات البن اليمني الأصيل (مطري وعديني)، شتلات الفواكه المطورة، وأشجار الزينة والظلال.',
                'address' => 'إب - منطقة السحول - الشارع العام',
                'latitude' => 13.9850,
                'longitude' => 44.1750,
                'rating' => 4.9,
                'logo_url' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=300&q=80',
                'cover_url' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=1200&q=80',
                'catalogs' => [
                    ['name' => 'شتلات البن اليمني', 'description' => 'أصناف عديني، دوائري، ومطري من أمهات ممتازة'],
                    ['name' => 'أشجار الفواكه والحمضيات', 'description' => 'رمان، عنب، مانجو، وبرتقال مطعم'],
                ],
            ],
            [
                'email' => 'tihama.seeds@zarah.app',
                'store_name' => 'مؤسسة تهامة الزراعية والبيوت المحمية',
                'store_type' => 'مستودع زراعي وموزع',
                'description' => 'خدمات المزارعين في سهل تهامة؛ بذور خضروات هجينة مقاومة للحرارة، شباك تظليل وبيوت محمية، وأسمدة سائلة عالية الامتصاص.',
                'address' => 'الحديدة - زبيد - جوار السوق المركزي',
                'latitude' => 14.1950,
                'longitude' => 43.3150,
                'rating' => 4.7,
                'logo_url' => 'https://images.unsplash.com/photo-1589923188900-85dae523342b?auto=format&fit=crop&w=300&q=80',
                'cover_url' => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=1200&q=80',
                'catalogs' => [
                    ['name' => 'بذور الخضروات الهجينة', 'description' => 'طماطم، بصل، خيار، حبحب تهامي'],
                    ['name' => 'مستلزمات البيوت المحمية', 'description' => 'بلاستيك زراعي، شباك ظل، ومصائد حشرية'],
                ],
            ],
            [
                'email' => 'sanaafarm@zarah.app',
                'store_name' => 'مزارع الصنعاني للبن والمنتجات العضوية',
                'store_type' => 'مزرعة ومتجر مباشر',
                'description' => 'نقدم محاصيل عضوية نقية مباشرة من مدرجات حراز ومناخة إلى المستهلك: بن يمني مختص مجفف طبيعياً، وعسل سدر دوعني خام.',
                'address' => 'صنعاء - حدة - شارع بيروت',
                'latitude' => 15.3120,
                'longitude' => 44.1850,
                'rating' => 5.0,
                'logo_url' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=300&q=80',
                'cover_url' => 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=1200&q=80',
                'catalogs' => [
                    ['name' => 'محاصيل البن المختص', 'description' => 'بن حرازي وخولاني مقطف يدوياً ومجفف على أسرّة شمسية'],
                    ['name' => 'عسل ومنتجات طبيعية', 'description' => 'عسل سدر طبيعي ولوز بلدي ممتاز'],
                ],
            ],
            [
                'email' => 'dhamar.seeds@zarah.app',
                'store_name' => 'مركز جهران للتقاوي والأسمدة المحسنة',
                'store_type' => 'تجارة تجزئة ومحطة تقاوي',
                'description' => 'تأمين أفضل تقاوي الحبوب والبطاطس المنتقاة من قاع جهران المخصب، واستشارات زراعية للموسمين الصيفي والشتوي.',
                'address' => 'ذمار - قاع جهران - مفرق معبر',
                'latitude' => 14.7890,
                'longitude' => 44.3050,
                'rating' => 4.8,
                'logo_url' => 'https://images.unsplash.com/photo-1595855759920-86582396756a?auto=format&fit=crop&w=300&q=80',
                'cover_url' => 'https://images.unsplash.com/photo-1574943320219-553eb213f72d?auto=format&fit=crop&w=1200&q=80',
                'catalogs' => [
                    ['name' => 'تقاوي بطاطس وحبوب', 'description' => 'أصناف ديامنت، سبونتا، وقمح مريسي'],
                ],
            ],
            [
                'email' => 'saada.store@zarah.app',
                'store_name' => 'مستودعات صعدة للمعدات ومضخات الآبار',
                'store_type' => 'مستودع تجاري للمعدات',
                'description' => 'تجهيزات زراعية ثقيلة، عزاقات ومحاريث يدوية، رشاشات مبيدات بمحركات يابانية، وقطع غيار مضخات الري لمزارع الرمان والحبوب.',
                'address' => 'صعدة - سوق الطلح التجاري العام',
                'latitude' => 16.9950,
                'longitude' => 43.7250,
                'rating' => 4.9,
                'logo_url' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=300&q=80',
                'cover_url' => 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=1200&q=80',
                'catalogs' => [
                    ['name' => 'معدات وآلات الحقل', 'description' => 'عزاقات، رشاشات، ومقصات تقليم هيدروليكية'],
                ],
            ],
        ];

        foreach ($stores as $index => $s) {
            $user = User::where('email', $s['email'])->first();
            if (! $user) {
                continue;
            }

            $logoPath = ImageHelper::download($s['logo_url'], "stores/logos/store_{$index}.jpg", $s['store_name']);
            $coverPath = ImageHelper::download($s['cover_url'], "stores/covers/store_{$index}.jpg", $s['store_name']);

            $store = Store::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'store_name' => $s['store_name'],
                    'slug' => Str::slug($s['store_name'], '-', 'ar') ?: 'store-'.$index,
                    'store_type' => $s['store_type'],
                    'description' => $s['description'],
                    'address' => $s['address'],
                    'latitude' => $s['latitude'],
                    'longitude' => $s['longitude'],
                    'rating' => $s['rating'],
                    'status' => 'active',
                    'logo' => $logoPath,
                    'cover' => $coverPath,
                ]
            );

            // Catalogs
            foreach ($s['catalogs'] as $cIndex => $cat) {
                StoreCatalog::updateOrCreate(
                    [
                        'store_id' => $store->id,
                        'name' => $cat['name'],
                    ],
                    [
                        'slug' => Str::slug($cat['name'], '-', 'ar') ?: 'cat-'.$cIndex,
                        'description' => $cat['description'],
                        'image_url' => $coverPath,
                        'sort_order' => $cIndex + 1,
                    ]
                );
            }
        }
    }
}
