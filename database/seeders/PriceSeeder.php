<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;
class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Price::create([
            'name' => '6-7 años',
            'value' => 0
        ]);

        Price::create([
            'name' => '7-8 años',
            'value' => 0
        ]);

        Price::create([
            'name' => '8-9 años',
            'value' => 0
        ]);

    }
}
