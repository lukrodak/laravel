<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Student;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Student::create([
                'first_name' => $faker->name, 
                'last_name' => $faker->name,
                'email' => $faker->email,
                'birthday' => $faker->date,
                'notes' => $faker->paragraph,
            ]);
        }
    }
}