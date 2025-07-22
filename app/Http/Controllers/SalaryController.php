<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
     public function index()
    {
        $salaryRecords = Salary::with('employee')->paginate(15);

        return view('admin.salary.index', get_defined_vars() );
    }
}
