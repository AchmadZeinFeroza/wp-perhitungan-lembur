<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ReferencesSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(OvertimeSeeder::class);
    }
}