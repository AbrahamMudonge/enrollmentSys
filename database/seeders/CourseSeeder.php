<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'courseName'=>'graphic design',
            'price'=>'45000',
            'startDate'=>'2016-11-19',
            'endDate'=>'2016-11-19',
            'description'=>'editing videos and photos',
            'create_by'=>1,
            
        ]);
    }
}
