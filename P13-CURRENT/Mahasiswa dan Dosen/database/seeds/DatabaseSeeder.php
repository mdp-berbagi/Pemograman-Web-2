<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database for realworld
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Start primary data seed...");

        $this->call([
            MajorSeeder::class
        ]);
    }
}
