<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name' => 'Concepto de Números'
        ]);

        Category::create([
            'name' => 'Operaciones Básicas'
        ]);

        Category::create([
            'name' => 'Serie de Números'
        ]);
    }
}
