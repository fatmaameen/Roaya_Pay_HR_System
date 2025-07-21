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
        'national_number_expire_date' => 'required|date',
        'national_id_issuing_dep' => 'required|string|max:255',
        'national_id_governorate' => 'required|string|max:255',
        'nationality' => 'required|string|max:255',
        'date_of_birth' => 'required|date',
        'birth_place' => 'required|string|max:255',
        'military_service' => 'nullable|in:إعفاء موقت,إعفاء نهائي,كبير عائلة,إعفاء الابن الوحيد,أدي الخدمة,إعفاء طبي',
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

        // جدول bank_account_
        'bank_account_number' => 'nullable|numeric',
        'issuing_bank_name' => 'nullable|string|max:100',
        'account_opening_branch' => 'nullable|string|max:100',

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

        // مرفقات ملفات الموظف
        'qualification' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'front_national_id' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'back_national_id' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'military_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'brent_insurance' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'employment_contract' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'experience_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    // حفظ صورة الموظف
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoName = time() . '_' . $photo->getClientOriginalName();
        $photo->move(public_path('uploads/employees/photos'), $photoName);
        $photoPath = 'uploads/employees/photos/' . $photoName;
    }

    // 1. إنشاء الموظف
    $employee = Employee::create([
        'code' => $validatedData['code'],
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'marital_status' => $validatedData['marital_status'],
        'religious' => $validatedData['religious'],
        'national_id_number' => $validatedData['national_id_number'],
        'national_number_release_date' => $validatedData['national_number_release_date'],
        'national_number_expire_date' => $validatedData['national_number_expire_date'],
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
    $employee->salary()->create(['total_salary' => $validatedData['total_salary']]);

    // 4. حساب البنك
    $employee->bankAccount()->create([
        'bank_account_number' => $validatedData['bank_account_number'],
        'issuing_bank_name' => $validatedData['issuing_bank_name'],
        'account_opening_branch' => $validatedData['account_opening_branch'],
    ]);

    // 5. التأمين الطبي
    $employee->medicalIncurance()->create($validatedData);

    // 6. التعليم
    $employee->education()->create($validatedData);

    // 7. بيانات الوظيفة
    $employee->jobDetail()->create([
        'appointment_date' => $validatedData['appointment_date'],
        'job_id' => $validatedData['job_id'],
        'department_id' => $validatedData['department_id'],
        'barnch_id' => $validatedData['barnch_id'],
    ]);

    // 8. بيانات التأمين
    $employee->insuranceInfo()->create([
        'insurance_number' => $validatedData['insurance_number'],
        'insurance_start_date' => $validatedData['insurance_start_date'],
        'insurance_agency' => $validatedData['insurance_agency'],
        'insurance_premium_value' => $validatedData['insurance_premium_value'],
        'insurance_end_date' => $validatedData['insurance_end_date'],
        'job_id' => $validatedData['job_id'],
    ]);

    // 9. مرفقات الموظف
    $attachments = [];
    $fields = [
        'qualification',
        'birth_certificate',
        'front_national_id',
        'back_national_id',
        'military_certificate',
        'brent_insurance',
        'employment_contract',
        'experience_certificate',
    ];

    foreach ($fields as $field) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $fileName = time() . '_' . $field . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/employees/docs'), $fileName);
            $attachments[$field] = 'uploads/employees/docs/' . $fileName;
        } else {
            $attachments[$field] = null;
        }
    }

    $employee->employeeInfo()->create($attachments);

    return redirect()->route('employees.index')->with('success', 'تمت إضافة الموظف بنجاح');
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
