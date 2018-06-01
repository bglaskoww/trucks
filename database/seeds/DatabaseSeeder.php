<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $tableForTruncate = [
        'users', 'tractors', 'plots', 'plot_tractor'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->tableForTruncate as $table) {
            \DB::table($table)->truncate();
        }

        $this->call(UsersTableSeeder::class);
        $this->call(PlotTractorTableSeeder::class);
    }
}
