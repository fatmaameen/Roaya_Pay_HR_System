<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class PenaltiesController extends Controller
{
    public function index()
    {
        return view('admin.penalties.index', [
            'penalties' => Penalty::with('employee')->paginate(10),
            'employees' => Employee::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string|max:255|',
            'value' => 'required|numeric',
            'reason' => 'required|string|max:255',
            'on_month' => 'required|max:255',
            'note' => 'nullable',
        ]);

        $request['date_of_action'] = Carbon::now()->toDateString();

        Penalty::create($request->all());

        session()->flash('success', "تم اضافة جزاء بنجاح");
        return redirect()->route('penalties.index');
    }

    public function update($id ,Request $request)
    {
        $request->validate([
            'user_id' => 'required|string|max:255|',
            'value' => 'required|numeric',
            'reason' => 'required|string|max:255',
            'on_month' => 'required|max:255',
            'note' => 'nullable',
        ]);

        $penalty = Penalty::findOrFail($id);

        $new_value = [
            'user_id' => $request->user_id,
            'value' => $request->value,
            'reason' => $request->reason,
            'on_month' => $request->on_month,
        ];

        try{
            $penalty->update($new_value);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث الجزاء بنجاح'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $penalty = Penalty::findOrFail($id);
            $penalty->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف الجزاء بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة الحذف: ' . $e->getMessage()
            ], 500);
        }
    }

    public function note($id ,Request $request)
    {
        $request->validate([
            'note' => 'nullable',
        ]);

        $penalty = Penalty::findOrFail($id);

        $new_value = [
            'note' => $request->note,
        ];

        try{
            $penalty->update($new_value);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث الجزاء بنجاح'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
