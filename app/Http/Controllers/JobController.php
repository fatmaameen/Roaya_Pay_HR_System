<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        return view('admin.jobs.index', [
            'index' => Job::paginate(10)
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:jobs,name',
        ]);

        Job::create($request->all());

        session()->flash('success', "تم اضافة الوظيفة بنجاح");
        return redirect()->route('jobs.index');
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:jobs,name,' . $job->id,
        ]);

        $job->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الوظيفة بنجاح'
        ]);
    }

    public function destroy($id)
    {
        try {
            $job = Job::findOrFail($id);
            $job->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف الوظيفة بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة الحذف: ' . $e->getMessage()
            ], 500);
        }
    }
}
