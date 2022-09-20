<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'Customer Service',
            'Accounting',
            'Marketing'
        ];

        foreach ($departments as $department) {
            Department::create([
                'department_name' => $department
            ]);
        }
        
    }
}
