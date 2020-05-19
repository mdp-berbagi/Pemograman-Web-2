<?php

use App\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $study = [
            [
                'number_code' => '25',
                'name' => 'Teknik Informatika'
            ],
            [
                'number_code' => '24',
                'name' => 'Sistem Informasi'
            ]
        ];

        foreach ($study as $each_study) {
            $this->command->info(" - Create {$each_study['name']}");
            $result = Major::firstOrCreate($each_study);

            if ($result->exists) {
                $this->command->info(" - {$each_study['name']} already exists.");
            }
        }
    }
}
