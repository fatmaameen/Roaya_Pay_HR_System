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

    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));


    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // جدول employees
            'code' => 'required|numeric|unique:employees,code',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:255',
            'marital_status' => 'required',
            'religious' => 'required',
            'national_id' => 'required|numeric|unique:employees,national_id',
            'national_id_release_date' => 'required|date',
            'national_id_expire_date' => 'required|date',
            'national_id_issuing_dep' => 'required|string|max:255',
            'national_id_governorate' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'military_service' => 'nullable',
            'military_number' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',

            // جدول contact_infos
            'address' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'governorate' => 'nullable|string|max:255',
            'personal_phone_number' => 'nullable',
            'company_phone_number' => 'nullable',
            'first_relative_phone_number' => 'nullable',
            'first_relative_relation' => 'nullable|string|max:255',
            'second_relative_phone_number' => 'nullable',
            'second_relative_relation' => 'nullable|string|max:255',

            // جدول salaries
            'total_salary' => 'nullable|numeric',

            // جدول bank_account_
            'bank_account_number' => 'nullable|numeric',
            'issuing_bank_name' => 'nullable|string|max:400',
            'account_opening_branch' => 'nullable|string|max:400',

            // جدول medical_incurances
            'documnet_number' => 'nullable|numeric',
            'insurance_company_name' => 'nullable|string|max:255',
            'insured_sim' => 'nullable|string|max:255',
            'medical_insurance_premium_value' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',

            // جدول education
            'educational_qualification' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'graduation_year' => 'nullable|string|max:4',
            'qualification_authority' => 'nullable|string|max:255',

            // جدول job_details
            'appointment_date' => 'nullable|date',
            'job_id' => 'nullable|exists:jobs,id',
            'department_id' => 'nullable|exists:departments,id',
            'branch_id' => 'nullable|exists:branches,id',

            // جدول insurance_infos
             'insurance_number' => 'nullable|numeric',
            'insurance_start_date' => 'nullable|date',
            'insurance_agency' => 'nullable|string',
            'insurance_premium_value' => 'nullable|numeric',
            'insurance_end_date' => 'nullable|date|after:insurance_start_date',



            // مرفقات ملفات الموظف
            'qualification' => 'nullable|file|max:2048',
            'birth_certificate' => 'nullable|file|max:2048',
            'front_national_id' => 'nullable|file|max:2048',
            'back_national_id' => 'nullable|file|max:2048',
            'military_certificate' => 'nullable|file|max:2048',
            'brent_insurance' => 'nullable|file|max:2048',
            'employment_contract' => 'nullable|file|max:2048',
              'experience_certificate.*' => 'nullable|file|max:2048',
        ], [
            // بيانات عامة
            'code.required' => 'كود الموظف مطلوب.',
            'code.numeric' => 'كود الموظف يجب أن يكون رقمًا.',
            'code.unique' => 'كود الموظف مستخدم من قبل.',

            'first_name.required' => 'الاسم الأول مطلوب.',
            'first_name.string' => 'الاسم الأول يجب أن يكون نصًا.',
            'first_name.max' => 'الاسم الأول لا يجب أن يزيد عن 100 حرف.',

            'last_name.required' => 'باقي الاسم مطلوب.',
            'last_name.string' => 'باقي الاسم يجب أن يكون نصًا.',
            'last_name.max' => 'باقي الاسم لا يجب أن يزيد عن 255 حرف.',

            'marital_status.required' => 'الحالة الاجتماعية مطلوبة.',
            'religious.required' => 'الديانة مطلوبة.',

            'national_id.required' => 'الرقم القومي مطلوب.',
            'national_id.string' => 'الرقم القومي يجب أن يكون نصًا.',
            'national_id.max' => 'الرقم القومي لا يجب أن يزيد عن 20 رقمًا.',
            'national_id.unique' => 'الرقم القومي مستخدم من قبل.',

            'national_id_release_date.required' => 'تاريخ إصدار الرقم القومي مطلوب.',
            'national_id_release_date.date' => 'تاريخ إصدار الرقم القومي غير صحيح.',

            'national_id_expire_date.required' => 'تاريخ انتهاء الرقم القومي مطلوب.',
            'national_id_expire_date.date' => 'تاريخ انتهاء الرقم القومي غير صحيح.',
            'national_id_expire_date.after' => 'تاريخ انتهاء الرقم القومي يجب أن يكون بعد تاريخ الإصدار.',

            'national_id_issuing_dep.required' => 'جهة إصدار الرقم القومي مطلوبة.',
            'national_id_governorate.required' => 'محافظة إصدار الرقم القومي مطلوبة.',
            'nationality.required' => 'الجنسية مطلوبة.',
            'date_of_birth.required' => 'تاريخ الميلاد مطلوب.',
            'date_of_birth.date' => 'تاريخ الميلاد غير صحيح.',
            'birth_place.required' => 'محل الميلاد مطلوب.',
            'gender.required' => 'النوع مطلوب.',

            'photo.image' => 'الصورة الشخصية يجب أن تكون صورة.',
            'photo.max' => 'أقصى حجم مسموح به للصورة هو 2 ميجا.',

            // بيانات الاتصال
            'phone.string' => 'رقم الهاتف يجب أن يكون نصًا.',
            'phone.max' => 'رقم الهاتف لا يجب أن يزيد عن 20 رقمًا.',
            'email.email' => 'البريد الإلكتروني غير صالح.',
            'email.max' => 'البريد الإلكتروني لا يجب أن يزيد عن 255 حرفًا.',
            'address.max' => 'العنوان لا يجب أن يزيد عن 255 حرفًا.',

            // التأمين
            'insurance_type.string' => 'نوع التأمين يجب أن يكون نصًا.',
            'insurance_number.string' => 'رقم التأمين يجب أن يكون نصًا.',
            'insurance_number.max' => 'رقم التأمين لا يجب أن يزيد عن 50 حرفًا.',
            'insurance_start_date.date' => 'تاريخ بداية التأمين غير صحيح.',
            'insurance_end_date.date' => 'تاريخ نهاية التأمين غير صحيح.',
            'insurance_end_date.after' => 'تاريخ نهاية التأمين يجب أن يكون بعد بدايته.',

            // التأمين الطبي
            'medical_insurance_company.string' => 'اسم شركة التأمين الطبي يجب أن يكون نصًا.',
            'medical_insurance_company.max' => 'اسم الشركة لا يجب أن يزيد عن 255 حرفًا.',
            'medical_insurance_number.string' => 'رقم التأمين الطبي يجب أن يكون نصًا.',
            'medical_insurance_number.max' => 'رقم التأمين الطبي لا يجب أن يزيد عن 50 حرفًا.',
            'medical_insurance_start_date.date' => 'تاريخ بداية التأمين الطبي غير صحيح.',
            'medical_insurance_end_date.date' => 'تاريخ نهاية التأمين الطبي غير صحيح.',
            'medical_insurance_end_date.after' => 'تاريخ نهاية التأمين الطبي يجب أن يكون بعد بدايته.',

            // المؤهلات
            'qualification.string' => 'المؤهل العلمي يجب أن يكون نصًا.',
            'qualification.max' => 'المؤهل العلمي لا يجب أن يزيد عن 255 حرفًا.',
            'qualification_date.date' => 'تاريخ الحصول على المؤهل غير صحيح.',
            'qualification_place.string' => 'جهة الحصول على المؤهل يجب أن تكون نصًا.',
            'qualification_place.max' => 'جهة الحصول على المؤهل لا يجب أن تزيد عن 255 حرفًا.',
        ]);


        // معالجة صورة الموظف
        $photoPath = null;
        if ($request->hasFile('photo'))
        {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Employees_images/'), $imageName);
            $photoPath = $imageName;
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
        $employee->contactInfo()->create([
          'address' => $validatedData['address'],
          'governorate' => $validatedData['governorate'],
          'neighborhood' => $validatedData['neighborhood'],
          'personal_phone_number' => $validatedData['personal_phone_number'],
          'company_phone_number' => $validatedData['company_phone_number'],
          'first_relative_phone_number' => $validatedData['first_relative_phone_number'],
          'first_relative_relation' => $validatedData['first_relative_relation'],
          'second_relative_phone_number' => $validatedData['second_relative_phone_number'],
          'second_relative_relation' => $validatedData['second_relative_relation'],
        ]);


        // 3. الراتب
        $employee->salary()->create([
                'total_salary' => $validatedData['total_salary'],
                // 'issuing_bank_name' => $validatedData['issuing_bank_name'],
                // 'account_opening_branch' => $validatedData['account_opening_branch'],
            ]);
        // 4. حساب البنك
        $employee->bankAccount()->create([
            'bank_account_number' => $validatedData['bank_account_number'],
            'issuing_bank_name' => $validatedData['issuing_bank_name'],
            'account_opening_branch' => $validatedData['account_opening_branch'],
        ]);
        // 5. التأمين الطبي
        $employee->medicalIncurance()->create([
            'documnet_number' => $validatedData['documnet_number'],
            'insurance_company_name' => $validatedData['insurance_company_name'],
            'insured_sim' => $validatedData['insured_sim'],
            'medical_insurance_premium_value' => $validatedData['medical_insurance_premium_value'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        // 6. التعليم
        $employee->education()->create([
            'educational_qualification' => $validatedData['educational_qualification'],
            'specialization' => $validatedData['specialization'],
            'graduation_year' => $validatedData['graduation_year'],
            'qualification_authority' => $validatedData['qualification_authority'],
        ]);




        // 7. بيانات الوظيفة
        $employee->jobDetail()->create([
            'appointment_date' => $validatedData['appointment_date'],
            'job_id' => $validatedData['job_id'],
            'department_id' => $validatedData['department_id'],
            'branch_id' => $validatedData['branch_id'],
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
        // معالجة المرفقات (كل ملف في سجل منفصل)


        $data = [];

        // رفع الملفات الفردية
        $fileFields = [
            'qualification',
            'birth_certificate',
            'front_national_id',
            'back_national_id',
            'military_certificate',
            'brent_insurance',
            'employment_contract'
        ];

        foreach ($fileFields as $field)
        {
            if ($request->hasFile($field))
            {
                $file = $request->file($field);
                $fileName = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($field . '_images/'), $fileName);
                $data[$field] = $fileName;
            }
        }

        // رفع شهادات الخبرة المتعددة
        $experienceFiles = [];
        if ($request->hasFile('experience_certificate'))
        {
            foreach ($request->file('experience_certificate') as $file)
            {
                $fileName = time() . '_' . uniqid() . '_experience.' . $file->getClientOriginalExtension();
                $file->move(public_path('experience_certificate_images/'), $fileName);
                $experienceFiles[] = $fileName;
            }

            // نحفظها كـ JSON string في قاعدة البيانات
            $data['experience_certificate'] = json_encode($experienceFiles);
        }

        // إنشاء السطر الواحد بكل البيانات
        $employee->employeeInfo()->create($data);


        return redirect()->route('employees.index')->with('success', 'تمت إضافة الموظف بنجاح');
    }
}
