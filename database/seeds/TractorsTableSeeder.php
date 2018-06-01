<?php

use App\Tractor;
use Illuminate\Database\Seeder;

class TractorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tractor::class, 10)->create();
    }
}
