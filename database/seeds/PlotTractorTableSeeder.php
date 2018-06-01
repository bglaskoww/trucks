<?php

use Illuminate\Database\Seeder;

class PlotTractorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\PlotTractor::class, 10)->create();
    }
}
