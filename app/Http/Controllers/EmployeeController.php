<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
     public function index()
    {
        return view('admin.employees.index', [

            'index' => Employee::paginate(10)
        ]);
    }


    public function create()
{
    $governorates = [
        'القاهرة', 'الجيزة', 'الإسكندرية', 'الدقهلية', 'البحر الأحمر', 'البحيرة',
        'الفيوم', 'الغربية', 'الإسماعيلية', 'المنوفية', 'المنيا', 'القليوبية',
        'الوادي الجديد', 'السويس', 'أسوان', 'أسيوط', 'بني سويف', 'بورسعيد',
        'دمياط', 'الشرقية', 'جنوب سيناء', 'كفر الشيخ', 'مطروح', 'الأقصر',
        'قنا', 'شمال سيناء', 'سوهاج'
    ];

    return view('admin.employees.create', compact('governorates'));
}

    public function store(Request $request)
    {
         // تعريف قواعد التحقق
     $this->rules = [
         'ar_name' => 'required',
         'en_name' => 'required',

     ];

       // التحقق من صحة البيانات
     $data = $this->validate($request, $this->rules);




        // إنشاء الحدث
        Employee::create($data);

        session()->flash('success', "تم اضافة البيانات بنجاح");
        return redirect()->route('Employeees');
    }

     public function edit($id)
     {
         $event = Employee::findOrFail($id);
         return view('admin.employees.edit', [

             'edit'  => $event,
         ]);
     }
     public function update(Request $request, $id)
 {
     $event = Employee::findOrFail($id);

     // التحقق من صحة البيانات
     $this->rules['ar_name'] = 'nullable';
     $this->rules['en_name'] = 'nullable' ;


     $this->rules['photo'] = 'sometimes|nullable|image';

     $data = $this->validate($request, $this->rules);


     // تحديث بيانات الحدث
     $event->update($data);

     // رسالة نجاح
     session()->flash('success', "تم تعديل البيانات بنجاح");
     return redirect('admin/employees');
 }
public function destroy($id)
{
    $Employee = Employee::findOrFail($id);
    $Employee->delete();

    return response()->json(['success' => true]);
}
}