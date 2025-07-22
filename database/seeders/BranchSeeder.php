<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create(['name'  => 'Branch01']);   
        Branch::create(['name'  => 'Branch02']);   
        Branch::create(['name'  => 'Branch03']);   
    }
}
