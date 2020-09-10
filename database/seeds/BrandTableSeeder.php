<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('brand')->insert([
        //     'brand_name' => "天猫",
        //     'brand_log' => 'http://2001.com/upload/cl2EElnoBnY2Q6H2bq1FRdzl8JejOj3AFqxWzd5G.jpeg',
        //     'brand_url' => "www.tianmao.com",
        //     'brand_desc' => "剑荡四方",
            // ]);
            // factory(App\Models\Brand::class, 10)->create()->each(function($u) {
                // $u->posts()->save(factory(BrandFactory::class)->make());
            // });
            factory(App\Models\Brand::class, 10)->create()->make();
    }
}
