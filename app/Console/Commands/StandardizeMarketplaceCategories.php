<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Modules\Marketplace\Domain\Models\Store;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class StandardizeMarketplaceCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marketplace:standardize-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Standardize marketplace categories in stores table and cleanup category names to professional list';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting categorization standardization (Professional Update)...');

        // Mapping: All legacy variations => New Professional Standard Names
        $mapping = [
            'اسمده' => 'أسمدة',
            'أسمدة زراعية' => 'أسمدة',
            'أسمدة ومخصبات' => 'أسمدة',
            'المشاتل' => 'مشاتل',
            'مشاتل ونباتات' => 'مشاتل',
            'معدات زراعية' => 'معدات وأدوات',
            'أدوات' => 'معدات وأدوات',
            'معدات' => 'معدات وأدوات',
            'بذور وشتلات' => 'بذور زراعية',
            'بذور' => 'بذور زراعية',
            'بذور وتقاوي' => 'بذور زراعية',
            'مبيدات' => 'مبيدات زراعية',
            'مبيدات وحماية' => 'مبيدات زراعية',
            'محاصيل' => 'منتجات زراعية',
            'ري' => 'أنظمة ري وطاقة',
            'طاقة' => 'أنظمة ري وطاقة',
            'أنظمة ري' => 'أنظمة ري وطاقة',
        ];

        DB::beginTransaction();

        try {
            foreach ($mapping as $old => $new) {
                $count = Store::where('store_type', $old)->count();
                if ($count > 0) {
                    $this->line("Updating $count stores from '$old' to '$new'...");
                    Store::where('store_type', $old)->update(['store_type' => $new]);
                }
                
                // Also update products if they have a category field (if applicable)
                // Note: Products usually use the category name directly if it was dirty
                DB::table('products')->where('category', $old)->update(['category' => $new]);
            }

            // Standard professional names
            $standardNames = [
                'بذور زراعية', 
                'أسمدة', 
                'مبيدات زراعية', 
                'أنظمة ري وطاقة',
                'معدات وأدوات', 
                'مشاتل', 
                'منتجات زراعية'
            ];
            
            // Remove categories that are not in the standard list
            $redundantCategories = Category::where('type', 'marketplace')
                ->whereNotIn('name', $standardNames)
                ->get();

            foreach ($redundantCategories as $cat) {
                $this->warn("Removing redundant category: {$cat->name}");
                $cat->delete();
            }

            DB::commit();
            $this->info('Standardization completed successfully.');
            
            $this->call('db:seed', ['--class' => 'MarketplaceCategorySeeder']);
            $this->info('MarketplaceCategorySeeder re-run to ensure all standard categories exist with correct icons.');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Error during standardization: ' . $e->getMessage());
        }
    }
}
