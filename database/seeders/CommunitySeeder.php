<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Community\Domain\Models\Comment;
use App\Modules\Community\Domain\Models\Like;
use App\Modules\Community\Domain\Models\Post;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all()->keyBy('email');
        if ($users->isEmpty()) {
            return;
        }

        $farmer = $users->get('farmer@zarah.app') ?? $users->first();
        $dhamar = $users->get('dhamar.farmer@zarah.app') ?? $users->first();
        $tariq = $users->get('tariq.ibb@zarah.app') ?? $users->first();
        $nasser = $users->get('nasser.taiz@zarah.app') ?? $users->first();
        $merchant = $users->get('merchant@zarah.app') ?? $users->first();
        $admin = $users->get('odaibishr@gmail.com') ?? $users->first();
        $test = $users->get('test@example.com') ?? $users->first();

        $postsData = [
            [
                'user' => $farmer,
                'title' => 'تحويل ري مزرعة البن في حراز إلى شبكة التنقيط بالطاقة الشمسية',
                'content' => 'الحمد لله تم الانتهاء من تركيب شبكة ري بالتنقيط بنقاطات تعويض ضغط GR لمدرجات البن على ارتفاع 1800 متر. وفرنا أكثر من 60% من استهلاك المياه المرفوعة بالطاقة الشمسية ولاحظنا تحسناً ملحوظاً في حيوية الشتلات وعدم تساقط أزهار العقد.',
                'image_url' => 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=800&q=80',
                'file_name' => 'posts/coffee_drip_post.jpg',
                'comments' => [
                    ['user' => $dhamar, 'text' => 'ما شاء الله تبارك الله تجربة رائدة يا باشمهندس. كم كلفة الهكتار الواحد تقريباً؟'],
                    ['user' => $farmer, 'text' => 'أهلاً يا أخ علي، كلفة المواد كانت حوالي 350 ألف ريال يمني للهكتار شاملة الليات والمحابس وتسترد قيمتها في أول موسم.'],
                    ['user' => $merchant, 'text' => 'نوفر في متجرنا ليات GR الإيطالية ذاتها ومستعدون لتقديم خصم لمزارعي تطبيق زرعة.'],
                ],
            ],
            [
                'user' => $tariq,
                'title' => 'تشخيص أعراض على أوراق الطماطم في البيت المحمي - ما هو العلاج؟',
                'content' => 'السلام عليكم يا إخواني المزارعين. ظهرت لدي هذه البقع الدائرية البنية المحاطة بهالة صفراء على الأوراق السفلية لنباتات الطماطم في الصوبة. هل هذه لفحة مبكرة أم نقص عناصر؟ وما هو أنسب علاج سريع؟',
                'image_url' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&w=800&q=80',
                'file_name' => 'posts/tomato_disease_post.jpg',
                'comments' => [
                    ['user' => $farmer, 'text' => 'هذه أعراض صريحة للفحة المبكرة (Early Blight). ينصح بالرش العاجل بمبيد جهازي يحتوي على مادة مانكوزيب أو ديفينوكونازول مع خفض رطوبة الصوبة بالتهوية.'],
                    ['user' => $merchant, 'text' => 'متوفر لدينا مبيد مانكوزيب أصلي 80% في متجر شركة الخير الزراعية ويوصلك في إب خلال 24 ساعة.'],
                ],
            ],
            [
                'user' => $admin,
                'title' => 'بدء موسم قطاف الرمان الصعداوي.. وفرة وجودة تصديرية استثنائية هذا العام',
                'content' => 'تزدهر أسواق صعدة وصنعاء هذه الأيام بأفواج شاحنات الرمان الصعداوي ذي الجودة الملكية. المزارعون طبقوا هذا العام برامج التسميد البوتاسي المتوازن مما قلل تشقق القشور وزاد نسبة السكرية والأحجام التصديرية الممتازة.',
                'image_url' => 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?auto=format&fit=crop&w=800&q=80',
                'file_name' => 'posts/pomegranate_harvest.jpg',
                'comments' => [
                    ['user' => $nasser, 'text' => 'فخر الإنتاج الزراعي اليمني! وصلتنا دفعات في تعز الحبة تفوق 600 جرام.'],
                    ['user' => $test, 'text' => 'الله يبارك للمزارعين ويزيدهم من فضله.'],
                ],
            ],
            [
                'user' => $dhamar,
                'title' => 'تحذير لمزارعي الحبوب والبطاطس في قاع جهران: توقعات بهبوط درجات الحرارة',
                'content' => 'إلى كافة إخواني المزارعين في ذمار وعنس وجهران، المؤشرات تشير إلى سكون في حركة الرياح مع انخفاض الحرارة فجراً إلى ما يقارب الصفر المئوي. ينصح بإجراء ريات خفيفة مسائية لتدفئة التربة وتشغيل الدخان الخفيف لحماية عروش البطاطس من الضريب.',
                'image_url' => 'https://images.unsplash.com/photo-1518977676601-b53f82aba655?auto=format&fit=crop&w=800&q=80',
                'file_name' => 'posts/dhamar_frost_warning.jpg',
                'comments' => [
                    ['user' => $farmer, 'text' => 'تنبيه قيم جداً، والري بالتنقيط في الليل يرفع حرارة التربة بمقدار 2-3 درجات كافية للإنقاذ.'],
                    ['user' => $tariq, 'text' => 'جزاك الله خيراً، سنأخذ الاحتياطات الليلة بإذن الله.'],
                ],
            ],
            [
                'user' => $nasser,
                'title' => 'موسم جني العنب الرازقي في بني حشيش وبدء تجفيف الزبيب الذهبي',
                'content' => 'لقطات من كرم العنب في صنعاء بعد جني قطوف العنب الرازقي الممتلئ. بدأنا بعملية التجفيف الشمسي الطبيعي على المداد التقليدي للحصول على الزبيب الرازقي الفاخر بدون أي مبيضات أو مواد كيماوية.',
                'image_url' => 'https://images.unsplash.com/photo-1537640538966-79f369143f8f?auto=format&fit=crop&w=800&q=80',
                'file_name' => 'posts/grape_raisin_post.jpg',
                'comments' => [
                    ['user' => $farmer, 'text' => 'أجود زبيب في العالم دون منازع، نكهة وجودة لا تضاهى.'],
                    ['user' => $merchant, 'text' => 'جاهزون لحجز كميات الزبيب المجفف مباشرة لعرضه في قسم المنتجات الطازجة بالمتجر.'],
                ],
            ],
            [
                'user' => $test,
                'title' => 'حقل القمح البلدي في مأرب بعد الرية الثالثة - نمو ممتاز بفضل الله',
                'content' => 'صورة لحقل القمح في مأرب، استخدمنا نظام الري المحوري مع التسميد الورقي بالزنك والفوسفور. نسبة التفريع عالية والسنابل بدأت بالتشكل بكثافة تبشر بموسم وفير.',
                'image_url' => 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?auto=format&fit=crop&w=800&q=80',
                'file_name' => 'posts/wheat_field_post.jpg',
                'comments' => [
                    ['user' => $dhamar, 'text' => 'ما شاء الله تبارك الله، مأرب أثبتت أنها سلة غذاء واعدة لليمن.'],
                ],
            ],
            [
                'user' => $farmer,
                'title' => 'علاج طبيعي بيولوجي لمكافحة المن وصانعات الأنفاق في أشجار الليمون والفاكهة',
                'content' => 'لكل من يسأل عن مكافحة آفة المن بدون إيذاء النحل: محلول صابون البوتاسيوم الزراعي أو مستخلص زيت النيم بتركيز 5 مل/لتر أثبت فاعلية 90% في القضاء على الحشرة وخنقها في طور الحورية دون أثر متبقٍ على الثمار.',
                'image_url' => 'https://images.unsplash.com/photo-1590682680695-43b964a3ae17?auto=format&fit=crop&w=800&q=80',
                'file_name' => 'posts/organic_pest_control.jpg',
                'comments' => [
                    ['user' => $tariq, 'text' => 'جربت زيت النيم الأسبوع الماضي وكانت النتيجة مبهرة، شكراً على الإفادة.'],
                ],
            ],
            [
                'user' => $merchant,
                'title' => 'نصائح لضبط إنفرترات الطاقة الشمسية الخاصة بمضخات الآبار مع حرارة الصيف',
                'content' => 'نظراً لارتفاع درجات الحرارة، نرجو من أصحاب الآبار التأكد من تركيب مراوح تهوية إضافية في غرف الإينفرتر، وتنظيف غبار الألواح أسبوعياً، حيث يؤدي الغبار المتراكم لفقد 25% من قدرة التوليد الكهربائي للغطاس.',
                'image_url' => 'https://images.unsplash.com/photo-1509391365360-2e959784a276?auto=format&fit=crop&w=800&q=80',
                'file_name' => 'posts/solar_maintenance_post.jpg',
                'comments' => [
                    ['user' => $farmer, 'text' => 'نصيحة في محلها تماماً، تنظيف الألواح رفع تدفق المياه لدينا من 4 إنش إلى 5 إنش.'],
                ],
            ],
        ];

        foreach ($postsData as $p) {
            $imagePath = ImageHelper::download($p['image_url'], $p['file_name'], $p['title']);

            $post = Post::create([
                'user_id' => $p['user']->id,
                'title' => $p['title'],
                'content' => $p['content'],
                'image_url' => $imagePath,
                'image' => $imagePath,
                'likes_count' => rand(5, 24),
                'reports_count' => 0,
                'is_hidden' => false,
            ]);

            // Add likes from diverse users
            foreach ($users->random(min(4, $users->count())) as $u) {
                Like::firstOrCreate([
                    'user_id' => $u->id,
                    'post_id' => $post->id,
                ]);
            }

            // Comments
            foreach ($p['comments'] as $c) {
                Comment::create([
                    'user_id' => $c['user']->id,
                    'post_id' => $post->id,
                    'content' => $c['text'],
                ]);
            }
        }
    }
}
