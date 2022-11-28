<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        for($i = 1 ; $i < 3 ; $i++){
            $teacher = new Teacher();
            $teacher->name = "Teacher ";
            $teacher->email = "email@mail.com";
            $teacher->password = Hash::make('12345678');
            $teacher->save();
        }
    }
}
