<?php

use Illuminate\Database\Seeder;

class MarykayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Marykay::class, 1000)->create();
    }
}
