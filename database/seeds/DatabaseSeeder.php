<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;
use App\Models\Course;
use App\Models\StudentAddresses;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CoursesTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(StudentsAddressTableSeeder::class);
    }
}
