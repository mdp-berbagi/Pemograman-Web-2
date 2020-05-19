<?php

use Illuminate\Database\Seeder;

class DatabaseSeederDummy extends Seeder
{
    /**
     * Seed the application's database for testing and dev
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DummyStudentSeeder::class
        ]);
    }
}
