<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaManager;

class AreaManagerController extends Controller
{
    public function index()
    {
        return view('admin.area-managers.index', [
            'index' => AreaManager::paginate(10)
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:area_managers,name',
        ]);

        AreaManager::create($request->all());

        session()->flash('success', "تم اضافة مديرين المناطق بنجاح");
        return redirect()->route('area-managers.index');
    }

    public function update(Request $request, AreaManager $manager)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:area_managers,name,' . $manager->id,
        ]);

        $manager->update($request->all());

        return response()->json([

            'success' => true,
            'message' => 'تم تحديث مديرين المناطق بنجاح'
        ]);
    }

    public function destroy($id)
    {
        try {
            $manager = AreaManager::findOrFail($id);
            $manager->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف مديرين المناطق بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة الحذف: ' . $e->getMessage()
            ], 500);
        }
    }
}
