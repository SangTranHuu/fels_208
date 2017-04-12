<?php

use Illuminate\Database\Seeder;

class GrammarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Grammar::class, 10)->create();
    }
}
