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
    protected $description = 'Standardize marketplace categories in stores table and cleanup category names';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting categorization standardization...');

        // Mapping: Old Name => New Standard Name
        $mapping = [
            'اسمده' => 'أسمدة',
            'المشاتل' => 'مشاتل',
            'معدات زراعية' => 'معدات',
            'بذور وشتلات' => 'بذور',
            'مبيدات زراعية' => 'مبيدات',
            'أدوات' => 'معدات',
        ];

        DB::beginTransaction();

        try {
            foreach ($mapping as $old => $new) {
                $count = Store::where('store_type', $old)->count();
                if ($count > 0) {
                    $this->line("Updating $count stores from '$old' to '$new'...");
                    Store::where('store_type', $old)->update(['store_type' => $new]);
                }
            }

            // Cleanup categories table: Remove names that don't match the standard or are duplicates
            $standardNames = ['بذور', 'أسمدة', 'مبيدات', 'محاصيل', 'معدات', 'مشاتل', 'نحل وعسل', 'مواشي وأعلاف', 'طاقة شمسية', 'خدمات زراعية', 'متنوع'];
            
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
            $this->info('MarketplaceCategorySeeder re-run to ensure all standard categories exist.');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Error during standardization: ' . $e->getMessage());
        }
    }
}
