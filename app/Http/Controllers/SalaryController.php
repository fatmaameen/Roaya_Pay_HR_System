<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
     public function index()
    {
        return view('admin.salary.index', [

            'index' => Employee::with('')->paginate(10)
        ]);
    }
}
