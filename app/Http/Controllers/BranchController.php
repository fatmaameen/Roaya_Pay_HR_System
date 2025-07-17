<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        return view('admin.branches.index', [
            'index' => Branch::paginate(10)
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:branches,name',
        ]);

        Branch::create($request->all());

        session()->flash('success', "تم اضافة الفرع بنجاح");
        return redirect()->route('branches.index');
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:branches,name,' . $branch->id,
        ]);

        $branch->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الفرع بنجاح'
        ]);
    }

    public function destroy($id)
    {
        try {
            $branch = Branch::findOrFail($id);
            $branch->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف الفرع بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة الحذف: ' . $e->getMessage()
            ], 500);
        }
    }
}
