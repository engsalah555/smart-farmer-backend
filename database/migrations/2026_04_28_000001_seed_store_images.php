<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Modules\Marketplace\Domain\Models\Store;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $logos = [
            'stores/b3P75P1jfxOOvCnLRG4oozME70VbLim3NhZ6cdoI.jpg',
            'stores/exD5xiyWH5ZkDmUUF0JCF0aayqHAM6uJXSLcqRJA.jpg',
            'stores/OLsYR8DPqEWCWOeMwQZOeIRKkBZCIvR5h0Wd4czd.jpg',
            'stores/r7lo46SmP0oZICgIMNeTHBm3IlNZ5mjKt9Joassa.jpg',
        ];

        $covers = [
            'stores/dSIoc3HGPVQxlV240x49caGCS9dEzvyBsrfKI7fe.jpg',
            'stores/GghSd4hvby7NrnuxdBTzlXQeSIS6SHyT8yyurBjG.jpg',
            'stores/lTBzjrSayfS0YmI7RDEr4m1UPP0lSzZisuz0IMew.jpg',
            'stores/PCz7VdpBivYGeZ82RuwVBJPEjXtoX18PNHZYrtOD.jpg',
        ];

        $stores = Store::all();
        foreach ($stores as $index => $store) {
            $store->logo = $logos[$index % count($logos)];
            $store->cover = $covers[$index % count($covers)];
            $store->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Store::query()->update(['logo' => null, 'cover' => null]);
    }
};
