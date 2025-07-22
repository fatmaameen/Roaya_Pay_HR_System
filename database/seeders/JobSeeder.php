<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create(['name'  => 'Job01']);   
        Job::create(['name'  => 'Job02']);   
        Job::create(['name'  => 'Job03']);   
    }
}
