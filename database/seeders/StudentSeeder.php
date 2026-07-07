<?php
// database/seeders/StudentSeeder.php
namespace Database\Seeders;

use App\Models\Student;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents; <-- You can delete this line
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instructs the factory to generate 50 student records and insert them into the database
        Student::factory(50)->create();
    }
}