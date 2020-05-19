<?php

use Illuminate\Database\Seeder;

class DummyStudentSeeder extends Seeder
{
    /**
     * Add example student data
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("- Making fake student");
        factory(App\Student::class, 50)->create();
        $this->command->info("- Make fake student complete");
    }
}
