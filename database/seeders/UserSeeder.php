<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // ================= Admins =================
            [
                'name' => 'عدي بشر',
                'email' => 'odaibishr@gmail.com',
                'user_type' => 'admin',
                'phone' => '+967771234567',
                'custom_title' => 'المشرف العام للنظام',
                'is_verified' => true,
                'is_iot_enabled' => true,
                'avatar_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/admin_odai.jpg',
            ],
            [
                'name' => 'إدارة منصة زرعة',
                'email' => 'admin@zarah.app',
                'user_type' => 'admin',
                'phone' => '+967770000001',
                'custom_title' => 'فريق الدعم والعمليات',
                'is_verified' => true,
                'is_iot_enabled' => true,
                'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/admin_zarah.jpg',
            ],

            // ================= Store Owners (Sellers) =================
            [
                'name' => 'الحاج مهيوب الزراعي',
                'email' => 'merchant@zarah.app',
                'user_type' => 'seller',
                'phone' => '+967777112233',
                'custom_title' => 'مدير شركة الخير للمستلزمات الزراعية',
                'is_verified' => true,
                'is_iot_enabled' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/merchant_mahyoub.jpg',
            ],
            [
                'name' => 'مؤسسة البركة للطاقة والري',
                'email' => 'albaraka@zarah.app',
                'user_type' => 'seller',
                'phone' => '+967773445566',
                'custom_title' => 'وكيل معتمد لمنظومات الطاقة ومضخات الآبار',
                'is_verified' => true,
                'is_iot_enabled' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/merchant_baraka.jpg',
            ],
            [
                'name' => 'شركة تهامة للبذور والمشاتل',
                'email' => 'tihama.seeds@zarah.app',
                'user_type' => 'seller',
                'phone' => '+967735667788',
                'custom_title' => 'إنتاج وتوزيع التقاوي والشتلات المعتمدة',
                'is_verified' => true,
                'is_iot_enabled' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/merchant_tihama.jpg',
            ],
            [
                'name' => 'مشاتل سحول إب الخضراء',
                'email' => 'sahool.ibb@zarah.app',
                'user_type' => 'seller',
                'phone' => '+967772114488',
                'custom_title' => 'مشاتل أشجار مثمرة ونباتات زينة',
                'is_verified' => true,
                'is_iot_enabled' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/merchant_sahool.jpg',
            ],
            [
                'name' => 'مزارع الصنعاني للبن العضوي',
                'email' => 'sanaafarm@zarah.app',
                'user_type' => 'seller',
                'phone' => '+967776655443',
                'custom_title' => 'منتج ومورد محاصيل بن وعسل طبيعي',
                'is_verified' => true,
                'is_iot_enabled' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/merchant_sanaafarm.jpg',
            ],
            [
                'name' => 'مركز جهران للتقاوي المحسنة',
                'email' => 'dhamar.seeds@zarah.app',
                'user_type' => 'seller',
                'phone' => '+967711998877',
                'custom_title' => 'مستودع تقاوي بطاطس وحبوب ذمار',
                'is_verified' => true,
                'is_iot_enabled' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1595855759920-86582396756a?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/merchant_dhamar.jpg',
            ],
            [
                'name' => 'مستودعات صعدة للمعدات الزراعية',
                'email' => 'saada.store@zarah.app',
                'user_type' => 'seller',
                'phone' => '+967774433221',
                'custom_title' => 'تجهيزات زراعية ومضخات آبار',
                'is_verified' => true,
                'is_iot_enabled' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/merchant_saada.jpg',
            ],

            // ================= Farmers & Users =================
            [
                'name' => 'م. عبد الله الصنعاني',
                'email' => 'farmer@zarah.app',
                'user_type' => 'user',
                'phone' => '+967778990011',
                'custom_title' => 'مهندس زراعي ومزارع بن وفواكه',
                'is_verified' => true,
                'is_iot_enabled' => true,
                'avatar_url' => 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/farmer_abdullah.jpg',
            ],
            [
                'name' => 'علي مسعد الذماري',
                'email' => 'dhamar.farmer@zarah.app',
                'user_type' => 'user',
                'phone' => '+967711224455',
                'custom_title' => 'مزارع حبوب وبطاطس - قاع جهران',
                'is_verified' => true,
                'is_iot_enabled' => true,
                'avatar_url' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/farmer_ali.jpg',
            ],
            [
                'name' => 'طارق العنسي',
                'email' => 'tariq.ibb@zarah.app',
                'user_type' => 'user',
                'phone' => '+967772233445',
                'custom_title' => 'مزارع خضروات وبيوت محمية',
                'is_verified' => true,
                'is_iot_enabled' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/farmer_tariq.jpg',
            ],
            [
                'name' => 'ناصر الحسام',
                'email' => 'nasser.taiz@zarah.app',
                'user_type' => 'user',
                'phone' => '+967775566778',
                'custom_title' => 'مزارع مانجو وبن - تعز',
                'is_verified' => true,
                'is_iot_enabled' => false,
                'avatar_url' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/farmer_nasser.jpg',
            ],
            [
                'name' => 'مزارع تجريبي',
                'email' => 'test@example.com',
                'user_type' => 'user',
                'phone' => '+967770000000',
                'custom_title' => 'مزارع ذكي تجريبي',
                'is_verified' => true,
                'is_iot_enabled' => true,
                'avatar_url' => 'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?auto=format&fit=crop&w=400&q=80',
                'file_name' => 'avatars/user_test.jpg',
            ],
        ];

        foreach ($users as $u) {
            $avatarPath = ImageHelper::download($u['avatar_url'], $u['file_name'], $u['name']);

            User::updateOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make('password'),
                    'user_type' => $u['user_type'],
                    'phone' => $u['phone'],
                    'profile_image' => $avatarPath,
                    'profile_photo_path' => $avatarPath,
                    'custom_title' => $u['custom_title'],
                    'is_verified' => $u['is_verified'],
                    'is_iot_enabled' => $u['is_iot_enabled'],
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
