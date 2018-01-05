<?php

use Illuminate\Database\Seeder;
use App\Models\Website;
class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $site = new Website();
        $site->name = "千册网";
//.....
        $site->save();
    }
}
