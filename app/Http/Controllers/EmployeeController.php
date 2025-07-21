<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   public function index()
{
    $employees = Employee::all();
    $jobs = Job::all();
    $departments = Department::all();
    $branches = Branch::all();

    return view('admin.employees.index', compact('employees', 'jobs', 'departments', 'branches'));
}


   public function create()
{
    $jobs = Job::all();
    $departments = Department::all();
    $branches = Branch::all();

    $governorates = [
        'القاهرة', 'الجيزة', 'الإسكندرية', 'الدقهلية', 'البحر الأحمر', 'البحيرة',
        'الفيوم', 'الغربية', 'الإسماعيلية', 'المنوفية', 'المنيا', 'القليوبية',
        'الوادي الجديد', 'السويس', 'أسوان', 'أسيوط', 'بني سويف', 'بورسعيد',
        'دمياط', 'الشرقية', 'جنوب سيناء', 'كفر الشيخ', 'مطروح', 'الأقصر',
        'قنا', 'شمال سيناء', 'سوهاج'
    ];

    return view('admin.employees.create', compact('governorates', 'jobs', 'departments', 'branches'));
}


   public function store(Request $request)
{
    $validatedData = $request->validate([
        // جدول employees
        'code' => 'required|numeric|unique:employees,code',
        'first_name' => 'required|string|max:100',
        'last_name' => 'required|string|max:255',
        'marital_status' => 'required|in:أعزب,متزوج,مطلق',
        'religious' => 'required|in:مسلم,مسيحي',
        'national_id_number' => 'required|string|max:20|unique:employees,national_id_number',
        'national_number_release_date' => 'required|date',
        'national_number_expire_date' => 'required|date|after_or_equal:national_id_release_date',
        'national_id_issuing_dep' => 'required|string|max:255',
        'national_id_governorate' => 'required|string|max:255',
        'nationality' => 'required|string|max:255',
        'date_of_birth' => 'required|date',
        'birth_place' => 'required|string|max:255',
        'military_service' => 'required|in:إعفاء موقت,إعفاء نهائي,كبير عائلة,إعفاء الابن الوحيد,أدي الخدمة,إعفاء طبي',
        'military_number' => 'nullable|numeric',
        'photo' => 'nullable|image|max:2048',

        // جدول contact_infos
        'address' => 'nullable|string|max:255',
        'neighborhood' => 'nullable|string|max:255',
        'governorate' => 'nullable|string|max:255',
        'personal_phone_number' => 'nullable|string|max:20',
        'company_phone_number' => 'nullable|string|max:20',
        'first_relative_phone_number' => 'nullable|string|max:20',
        'first_relative_relation' => 'nullable|string|max:255',
        'second_relative_phone_number' => 'nullable|string|max:20',
        'second_relative_relation' => 'nullable|string|max:255',

        // جدول salaries
        'total_salary' => 'nullable|numeric',
        'main_salary' => 'nullable|numeric',
        'transfer_allowance' => 'nullable|numeric',
        'salary_notes' => 'nullable|string',

        // جدول medical_incurances
        'documnet_number' => 'nullable|numeric',
        'insurance_company_name' => 'nullable|string|max:255',
        'insured_sim' => 'nullable|string|max:255',
        'medical_insurance_premium_value' => 'nullable|numeric',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',

        // جدول education
        'educational_qualification' => 'nullable|string|max:255',
        'specialization' => 'nullable|string|max:255',
        'graduation_year' => 'nullable|string|max:4',
        'qualification_authority' => 'nullable|string|max:255',

        // جدول job_details
        'job_title' => 'nullable|string|max:255',
        'appointment_date' => 'nullable|date',
        'job_id' => 'required|exists:jobs,id',
        'department_id' => 'required|exists:departments,id',
        'barnch_id' => 'required|exists:branches,id',

        // جدول insurance_infos
        'insurance_number' => 'nullable|string|max:255',
        'insurance_start_date' => 'nullable|date',
        'insurance_agency' => 'nullable|string|max:255',
        'insurance_premium_value' => 'nullable|numeric',
        'insurance_end_date' => 'nullable|date|after_or_equal:insurance_start_date',

        // جدول employee_infos (مرفقات)
        'qualification' => 'nullable|string',
        'birth_certificate' => 'nullable|string',
        'front_national_id' => 'nullable|string',
        'back_national_id' => 'nullable|string',
        'military_certificate' => 'nullable|string',
        'brent_insurance' => 'nullable|string',
        'employment_contract' => 'nullable|string',
        'experience_certificate' => 'nullable|string',
    ]);

    // رفع الصورة لو موجودة
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('employees/photos', 'public');
    }

    // 1. إنشاء الموظف
    $employee = Employee::create([
        'code' => $validatedData['code'],
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'marital_status' => $validatedData['marital_status'],
        'religious' => $validatedData['religious'],
        'national_id' => $validatedData['national_id'],
        'national_id_release_date' => $validatedData['national_id_release_date'],
        'national_id_expire_date' => $validatedData['national_id_expire_date'],
        'national_id_issuing_dep' => $validatedData['national_id_issuing_dep'],
        'national_id_governorate' => $validatedData['national_id_governorate'],
        'nationality' => $validatedData['nationality'],
        'date_of_birth' => $validatedData['date_of_birth'],
        'birth_place' => $validatedData['birth_place'],
        'military_service' => $validatedData['military_service'],
        'military_number' => $validatedData['military_number'],
        'photo' => $photoPath,
    ]);

    // 2. بيانات الاتصال
    $employee->contactInfo()->create($validatedData);

    // 3. الراتب
    $employee->salary()->create([
        'total_salary' => $validatedData['total_salary'],
        'main_salary' => $validatedData['main_salary'],
        'transfer_allowance' => $validatedData['transfer_allowance'],
        'notes' => $validatedData['salary_notes'],
    ]);

    // 4. التأمين الطبي
    $employee->medicalIncurance()->create($validatedData);

    // 5. التعليم
    $employee->education()->create($validatedData);

    // 6. بيانات الوظيفة
    $employee->jobDetail()->create([
        'job_title' => $validatedData['job_title'],
        'appointment_date' => $validatedData['appointment_date'],
        'job_id' => $validatedData['job_id'],
        'department_id' => $validatedData['department_id'],
        'barnch_id' => $validatedData['barnch_id'],
    ]);

    // 7. بيانات التأمين
    $employee->insuranceInfo()->create([
        'insurance_number' => $validatedData['insurance_number'],
        'insurance_start_date' => $validatedData['insurance_start_date'],
        'insurance_agency' => $validatedData['insurance_agency'],
        'insurance_premium_value' => $validatedData['insurance_premium_value'],
        'insurance_end_date' => $validatedData['insurance_end_date'],
        'job_id' => $validatedData['job_id'],
    ]);

    // 8. ملفات الموظف
    $employee->employeeInfo()->create([
        'qualification' => $validatedData['qualification'],
        'birth_certificate' => $validatedData['birth_certificate'],
        'front_national_id' => $validatedData['front_national_id'],
        'back_national_id' => $validatedData['back_national_id'],
        'military_certificate' => $validatedData['military_certificate'],
        'brent_insurance' => $validatedData['brent_insurance'],
        'employment_contract' => $validatedData['employment_contract'],
        'experience_certificate' => $validatedData['experience_certificate'],
    ]);

    return redirect()->back()->with('success', 'تمت إضافة الموظف بنجاح');
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
