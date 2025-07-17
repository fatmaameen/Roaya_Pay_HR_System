<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supervisor;

class supervisorController extends Controller
{
    public function index()
    {
        return view('admin.supervisors.index', [
            'index' => supervisor::paginate(10)
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:supervisors,name',
        ]);

        supervisor::create($request->all());

        session()->flash('success', "تم اضافة المشرف بنجاح");
        return redirect()->route('supervisors.index');
    }

    public function update(Request $request, supervisor $supervisor)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:supervisors,name,' . $supervisor->id,
        ]);

        $supervisor->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث المشرف بنجاح'
        ]);
    }

    public function destroy($id)
    {
        try {
            $supervisor = supervisor::findOrFail($id);
            $supervisor->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف المشرف بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة الحذف: ' . $e->getMessage()
            ], 500);
        }
    }
}
