<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.departments.index', [

            'index' => Department::paginate(10)
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255|unique:departments,department_name',
        ]);

        Department::create($request->all());

        session()->flash('success', "تم اضافة القسم بنجاح");
        return redirect()->route('departments.index');
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required|string|max:255|unique:departments,department_name,' . $department->id,
        ]);

        $department->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث القسم بنجاح'
        ]);
    }

    public function destroy($id)
    {
        try {
            $department = Department::findOrFail($id);
            $department->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف القسم بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة الحذف: ' . $e->getMessage()
            ], 500);
        }
    }
}
