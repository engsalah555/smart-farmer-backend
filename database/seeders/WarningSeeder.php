<?php

namespace Database\Seeders;

use App\Modules\PlantGuide\Domain\Models\Warning;
use Illuminate\Database\Seeder;

class WarningSeeder extends Seeder
{
    public function run(): void
    {
        $warnings = [
            [
                'title' => 'تحذير مناخي: موجة صقيع (ضريب) متوقعة في المرتفعات',
                'message' => 'تشير مؤشرات الأرصاد الزراعية إلى احتمالية هبوط درجات الحرارة إلى ما يقارب الصفر المئوي في قيعان ذمار، صنعاء، وعمران فجر الغد. نهيب بالمزارعين تغطية المشاتل وتشغيل رشاشات المياه أو الري الخفيف فجراً لحماية عروش البطاطس والخضار.',
                'type' => 'weather',
                'severity' => 'critical',
                'location' => 'ذمار، صنعاء، عمران، صعدة',
                'active' => true,
                'expires_at' => now()->addDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'إنذار وبائي: رصد بؤر لحافرة الطماطم (توتا أبسلوتا)',
                'message' => 'تم رصد نشاط متزايد لآفة حافرة الطماطم في مزارع تهامة ومأرب. يرجى من المزارعين فحص السطح السفلي للأوراق ونصب المصائد الفرمونية والرش الوقائي الفوري بالمبيدات المتخصصة المسجلة.',
                'type' => 'pest',
                'severity' => 'high',
                'location' => 'الحديدة، مأرب، الجوف',
                'active' => true,
                'expires_at' => now()->addDays(7),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'إرشاد موسمي: بدء موسم غرس شتلات البن والفاكهة',
                'message' => 'مع حلول فترات اعتدال الطقس ورطوبة التربة المناسبة، ينصح بالبدء في غرس شتلات البن والأشجار المثمرة مع الالتزام بخلط التربة بالسماد البلدي المعقم وتأمين مصدات الرياح.',
                'type' => 'general',
                'severity' => 'low',
                'location' => 'محافظات المرتفعات الغربية والوسطى',
                'active' => true,
                'expires_at' => now()->addDays(14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($warnings as $w) {
            Warning::create($w);
        }
    }
}
