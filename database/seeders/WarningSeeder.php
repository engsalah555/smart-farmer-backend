<?php

namespace Database\Seeders;

use App\Models\Warning;
use Illuminate\Database\Seeder;

class WarningSeeder extends Seeder
{
    /**
     * تعبئة بيانات التحذيرات الأولية.
     *
     * تشغيل: php artisan db:seed --class=WarningSeeder
     */
    public function run(): void
    {
        // تجنب إدراج مكرر
        if (Warning::count() > 0) {
            $this->command->info('WarningSeeder: تم تخطي الإدراج — البيانات موجودة مسبقاً');

            return;
        }

        Warning::insert([
            [
                'title' => 'تحذير من موجة صقيع',
                'message' => 'من المتوقع انخفاض درجات الحرارة إلى ما دون الصفر مئوية خلال اليومين القادمين. يرجى أخذ الاحتياطات اللازمة لحماية المحاصيل.',
                'type' => 'weather',
                'severity' => 'critical',
                'location' => 'المناطق الشمالية والوسطى',
                'active' => true,
                'expires_at' => now()->addDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'ظهور آفة زراعية جديدة',
                'message' => 'تم رصد انتشار لحشرة المن في المزارع المجاورة. ينصح بالرش الوقائي.',
                'type' => 'pest',
                'severity' => 'high',
                'location' => 'كل المناطق',
                'active' => true,
                'expires_at' => now()->addDays(7),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'إشعار تحديث',
                'message' => 'تم تحديث أسعار الأسمدة في قسم الماركت. تفقد العروض الجديدة.',
                'type' => 'general',
                'severity' => 'low',
                'location' => null,
                'active' => true,
                'expires_at' => now()->addDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $this->command->info('WarningSeeder: تمت إضافة 3 تحذيرات بنجاح ✅');
    }
}
