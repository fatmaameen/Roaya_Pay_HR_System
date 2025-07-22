<?php

namespace App\Http\Controllers;

use App\Http\Requests\Commissions\StoreCommissionRequest;
use App\Models\Commission;
use App\Models\Employee;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index()
    {
        $commissions = Commission::get();
        $employees = Employee::get();
        return view('admin.commissions.index', get_defined_vars());
    }



    public function store(StoreCommissionRequest $request)
    {
        $data = $request->validated();

        Commission::create($data);

        session()->flash('success', "تم اضافة العمولة بنجاح");
        return redirect()->route('commissions.index');
    }



    // 
}
