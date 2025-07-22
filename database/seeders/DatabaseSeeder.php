<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        $this->call([
            JobSeeder::class,
            BranchSeeder::class,
            DepartmentSeeder::class,
        ]);
=======
        
        Branch::create(['name' => 'Branch01']);
        Branch::create(['name' => 'Branch02']);
        Branch::create(['name' => 'Branch03']);

        Job::create(['name' => 'Job01']);
        Job::create(['name' => 'Job02']);
        Job::create(['name' => 'Job03']);

        Department::create(['name' => 'Department01']);
        Department::create(['name' => 'Department02']);
        Department::create(['name' => 'Department03']);

        Employee::create([
            'code'              => 2222,
            'first_name'        => 'Hany',
            'last_name'         => 'Tester',
            'marital_status'    => 'أعزب',
            'religious'         => 'مسلم',
            'national_id'       => '4611512451',
            'national_id_release_date'          => '2002-08-01',
            'national_id_expire_date'           => '2002-08-01',
            'national_id_issuing_dep'       => 'bajour',
            'national_id_governorate'       => 'Monofia',
            'nationality'               => 'Egyptian',
            'date_of_birth'             => '2002-08-01',
            'birth_place'               => 'bajour',
            'military_service'          => 1,
            
        ]);

        Employee::create([
            'code'              => 3333,
            'first_name'        => 'Mona',
            'last_name'         => 'Tester',
            'marital_status'    => 'أعزب',
            'religious'         => 'مسلم',
            'national_id'       => '4611512451',
            'national_id_release_date'          => '2002-08-01',
            'national_id_expire_date'           => '2002-08-01',
            'national_id_issuing_dep'       => 'bajour',
            'national_id_governorate'       => 'Monofia',
            'nationality'               => 'Egyptian',
            'date_of_birth'             => '2002-08-01',
            'birth_place'               => 'bajour',
            'military_service'          => 1,
            
        ]);

        Employee::create([
            'code'              => 4444,
            'first_name'        => 'Mai',
            'last_name'         => 'Tester',
            'marital_status'    => 'أعزب',
            'religious'         => 'مسلم',
            'national_id'       => '4611512451',
            'national_id_release_date'          => '2002-08-01',
            'national_id_expire_date'           => '2002-08-01',
            'national_id_issuing_dep'       => 'bajour',
            'national_id_governorate'       => 'Monofia',
            'nationality'               => 'Egyptian',
            'date_of_birth'             => '2002-08-01',
            'birth_place'               => 'bajour',
            'military_service'          => 1,
            
        ]);

>>>>>>> 18d3d206baca2ee800b29c66bedaedaa8b4e92aa
    }
}
