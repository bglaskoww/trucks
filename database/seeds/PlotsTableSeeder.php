<?php

use App\Plot;
use Illuminate\Database\Seeder;

class PlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Plot::class, 10)->create();
    }
}
