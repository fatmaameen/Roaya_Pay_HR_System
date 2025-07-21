@extends('admin.layouts.app')

@section('content')

    <div class="content-body">
        <section class="basic-vertical-layout">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card" style="border: 1px solid #ddd; border-radius: 5px;">
                        <div class="card-header">
                            <h4 class="card-title" style="font-weight: bold; color: #333;">
                                <i class="la la-id-card"></i> بيانات الموظف
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data"
                                    class="form form-vertical">
                                    @csrf

                                    <!-- البيانات الأساسية -->
                                    <div class="form-section"
                                        style="margin-bottom: 30px; border-bottom: 2px solid #f5f5f5; padding-bottom: 20px;">
                                        <h5 style="color: #2c5a9d; font-weight: bold; margin-bottom: 20px;">
                                            <i class="la la-user"></i> البيانات الأساسية
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group" style="display: flex; align-items: center;">
                                                    <label for="first_name" class="required"
                                                        style="margin-bottom: 0; margin-left: 10px; min-width: 80px;">كود الموظف
                                                        </label>
                                                    <input type="text" id="code" name="code"
                                                        class="form-control" required
                                                        style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" style="display: flex; align-items: center;">
                                                    <label for="first_name" class="required"
                                                        style="margin-bottom: 0; margin-left: 10px; min-width: 80px;">الاسم
                                                        الأول</label>
                                                    <input type="text" id="first_name" name="first_name"
                                                        class="form-control" required
                                                        style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="display: flex; align-items: center;">
                                                    <label for="last_name" class="required"
                                                        style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">باقي
                                                        الاسم كاملا</label>
                                                    <input type="text" id="last_name" name="last_name"
                                                        class="form-control" required
                                                        style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group" style="display: flex; align-items: center;">
                                                    <label for="marital_status"
                                                        style="margin-bottom: 0; margin-left: 10px; min-width: 120px;">الحالة
                                                        الاجتماعية</label>
                                                    <select id="marital_status" name="marital_status" class="form-control"
                                                        style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                        <option value="">اختر </option>
                                                        <option value="اعزب">أعزب</option>
                                                        <option value="متزوج">متزوج</option>
                                                             <option value="مطلق">مطلق</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" style="display: flex; align-items: center;">
                                                    <label for="religion"
                                                        style="margin-bottom: 0; margin-left: 10px; min-width: 60px;">الديانة</label>
                                                    <select id="religion" name="religious" class="form-control"
                                                        style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                        <option value="">اختر </option>
                                                        <option value="مسلم">مسلم</option>
                                                        <option value="مسيحي">مسيحي</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" style="display: flex; align-items: center;">
                                                    <label for="national_id_number" class="required"
                                                        style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">الرقم
                                                        القومي</label>
                                                    <input type="number" id="national_id_number" name="national_number"
                                                        class="form-control" required
                                                        style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                </div>
                                            </div>
                                            <div class="row">

    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="release_date" class="required"
                style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                تاريخ الإصدار
            </label>
            <input type="date" id="release_date"
                name="national_number_release_date" class="form-control" required
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="national_number_expire_date" class="required"
                style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                تاريخ الانتهاء
            </label>
            <input type="date" id="national_number_expire_date"
                name="national_number_expire_date" class="form-control" required
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;" readonly>
        </div>

</div>

                                                <div class="col-md-4">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="national_id_number" class="required"
                                                            style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                                                            سجل الاصدار</label>
                                                        <input type="text" id="national_id_number"
                                                            name="national_id_number" class="form-control" required
                                                            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
     <div class="col-md-3">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="governorate" class="required"
                                                            style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">محافظة
                                                            الإصدار</label>
                                                        <select id="governorate" name="national_number_governorate"
                                                            class="form-control select2" required style="flex-grow: 1;">
                                                            <option value="">اختر </option>
                                                            @foreach ($governorates as $gov)
                                                                <option value="{{ $gov }}">{{ $gov }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                              <div class="col-md-3">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="nationality" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">الجنسية</label>
        <select name="nationality" id="nationality" class="form-control select2" style="flex-grow: 1;">
            @php
                $nationalities = ['مصرية', 'سعودية', 'سودانية', 'سورية', 'فلسطينية', 'أردنية', 'عراقية', 'ليبية', 'جزائرية', 'مغربية', 'تونسية', 'يمنية', 'لبنانية', 'قطرية', 'إماراتية', 'بحرينية', 'كويتية', 'عمانية'];
            @endphp
            @foreach ($nationalities as $nationality)
                <option value="{{ $nationality }}" {{ $nationality == 'مصرية' ? 'selected' : '' }}>
                    {{ $nationality }}
                </option>
            @endforeach
        </select>
    </div>
</div>

                                                <div class="col-md-4">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="birth_date"
                                                            style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">تاريخ
                                                            الميلاد</label>
                                                        <input type="date" id="birth_date" name="date_of_birth"
                                                            class="form-control"
                                                            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="birth_date"
                                                            style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">محل
                                                            الميلاد</label>
                                                        <input type="text" name="birth_place" class="form-control"
                                                            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="row">
<div class="col-md-3">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="military_service" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
            الخدمة العسكرية
        </label>
        <select name="military_service" id="military_service" class="form-control"
            style="height: 40px; border: none; border-bottom: 1px solid #ddd; flex-grow: 1;">
            <option value="">-- اختر --</option>
            <option value="1">اعفاء مؤقت</option>
            <option value="2">اعفاء نهائي</option>
            <option value="3">اعفاء كبير عائلة</option>
            <option value="4">اعفاء الابن الوحيد</option>
            <option value="5">أدى الخدمة</option>
            <option value="6">اعفاء طبي</option>
        </select>
    </div>
</div>


<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="military_number" style="margin-bottom: 0; margin-left: 10px; min-width: 140px; white-space: nowrap;">
            الرقم العسكري الثلاثي
        </label>
        <input type="text" name="military_number" id="military_number" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>


    <div class="col-md-3">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="national_id_number" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                صورة شخصية
            </label>
            <input type="file" name="photo" id="national_id_number" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>
                                        </div>
                                    </div>
                            </div>

                            <!-- بيانات التواصل -->
                            <div class="form-section"
                                style="margin-bottom: 30px; border-bottom: 2px solid #f5f5f5; padding-bottom: 20px;">
                                <h5 style="color: #2c5a9d; font-weight: bold; margin-bottom: 20px;">
                                    <i class="la la-phone"></i> بيانات التواصل
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label for="phone" class="required"
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 80px;">
                                                عنوان السكن</label>
                                            <input type="text" id="phone" name="address" class="form-control"
                                                required
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>
                                         <div class="col-md-3">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label for="governorate"
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 60px;">المحافظة</label>
                                            <input type="text" id="governorate" name="governorate" class="form-control"
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label for="email"
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 120px;">المركز/الحي
                                                </label>
                                            <input type="text" id="neighborhood" name="neighborhood" class="form-control"
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
    {{-- رقم الهاتف الشخصي --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="personal_phone_number" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                رقم الهاتف الشخصي
            </label>
            <input type="number" name="personal_phone_number" id="personal_phone_number" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- رقم هاتف من الشركة --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="company_phone_number" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                رقم هاتف من الشركة
            </label>
            <input type="number" name="company_phone_number" id="company_phone_number" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- رقم القريب الأول --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="first_relative_phone_number" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                رقم القريب الأول
            </label>
            <input type="number" name="first_relative_phone_number" id="first_relative_phone_number" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- درجة القرابة 1 --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="first_relative_relation" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                درجة القرابة 1
            </label>
            <input type="text" name="first_relative_relation" id="first_relative_relation" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- رقم القريب الثاني --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="second_relative_phone_number" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                رقم القريب الثاني
            </label>
            <input type="number" name="second_relative_phone_number" id="second_relative_phone_number" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- درجة القرابة 2 --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="second_relative_relation" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                درجة القرابة 2
            </label>
            <input type="text" name="second_relative_relation" id="second_relative_relation" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>
</div>

                            </div>

                            <!-- تفاصيل الوظيفة -->
                            <div class="form-section"
                                style="margin-bottom: 30px; border-bottom: 2px solid #f5f5f5; padding-bottom: 20px;">
                                <h5 style="color: #2c5a9d; font-weight: bold; margin-bottom: 20px;">
                                    <i class="la la-briefcase"></i> تفاصيل الوظيفة
                                </h5>
                                <div class="row">
                                  <div class="col-md-3">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="job_name" class="required"
            style="margin-bottom: 0; margin-left: 10px; min-width: 80px;">اسم الوظيفة</label>
        <select id="job_name" name="job_id" class="form-control select2" required
            style="height: 40px; flex-grow: 1;">
            <option value="">اختر </option>
            @foreach ($jobs as $job)
                <option value="{{ $job->id }}">{{ $job->name }}</option>
            @endforeach
        </select>
    </div>
</div>

                                 <div class="col-md-2">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="department" class="required"
            style="margin-bottom: 0; margin-left: 10px; min-width: 50px;">القسم</label>
        <select id="department" name="department_id" class="form-control select2" required
            style="height: 40px; flex-grow: 1;">
            <option value="">اختر </option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-2">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="branch"
            style="margin-bottom: 0; margin-left: 10px; min-width: 50px;">الفرع</label>
        <select id="branch" name="branch_id" class="form-control select2"
            style="height: 40px; flex-grow: 1;">
            <option value="">اختر </option>
            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>
    </div>
</div>

                                        <div class="col-md-3">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label for="appointment_date" class="required"
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">تاريخ
                                                التعيين</label>
                                            <input type="date" id="appointment_date" name="appointment_date"
                                                class="form-control" required
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- البيانات التعليمية -->
                            <div class="form-section"
                                style="margin-bottom: 30px; border-bottom: 2px solid #f5f5f5; padding-bottom: 20px;">
                                <h5 style="color: #2c5a9d; font-weight: bold; margin-bottom: 20px;">
                                    <i class="la la-graduation-cap"></i> البيانات التعليمية
                                </h5>
                                <div class="row">
                                  <div class="col-md-3">
   <div class="form-group" style="display: flex; align-items: center;">
        <label for="educational_qualification"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            المؤهل الدراسي
        </label>
        <input type="text" id="educational_qualification" name="educational_qualification" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

<div class="col-md-5">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="specialization"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            التخصص العلمي
        </label>
        <input type="text" id="specialization" name="specialization" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

<div class="col-md-3">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="graduation_year"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            سنة التخرج
        </label>
        <input type="date" id="graduation_year" name="graduation_year" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="qualification_authority"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            جهة المؤهل
        </label>
        <input type="text" id="qualification_authority" name="qualification_authority" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

                                </div>

                            </div>
   <!--  بيانات الرقم التاميني -->
                            <div class="form-section"
                                style="margin-bottom: 30px; border-bottom: 2px solid #f5f5f5; padding-bottom: 20px;">
                                <h5 style="color: #2c5a9d; font-weight: bold; margin-bottom: 20px;">
                                    <i class="la la-shield-alt"></i> بيانات الرقم التاميني
                                </h5>
                                <div class="row">
                                  <div class="col-md-3">
   <div class="form-group" style="display: flex; align-items: center;">
        <label for="insurance_number"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
             الرقم التاميني
        </label>
        <input type="number" id="insurance_number" name="insurance_number" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="insurance_start_date"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
             تاريخ البداية
        </label>
        <input type="date" id="insurance_start_date" name="insurance_start_date" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>




<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="insurance_agency"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            التابع لتامينات
        </label>
        <input type="text" id="insurance_agency" name="insurance_agency" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>
<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="insurance_premium_value"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            قيمة قسط التامين
        </label>
        <input type="number" id="insurance_premium_value" name="insurance_premium_value" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>
<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="insurance_end_date"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
             تاريخ الفصل
        </label>
        <input type="date" id="insurance_end_date" name="insurance_end_date" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>
                                </div>

                            </div>

                         <!--  التامين الطبي -->
                            <div class="form-section"
                                style="margin-bottom: 30px; border-bottom: 2px solid #f5f5f5; padding-bottom: 20px;">
                                <h5 style="color: #2c5a9d; font-weight: bold; margin-bottom: 20px;">
                                    <i class="la la-heartbeat"></i> التامين الطبي
                                </h5>
                         <div class="row">
    {{-- رقم الوثيقة --}}
    <div class="col-md-3">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="documnet_number"
                style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
                رقم الوثيقة
            </label>
            <input type="number" id="documnet_number" name="documnet_number" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- تاريخ البداية --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="start_date"
                style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
                تاريخ البداية
            </label>
            <input type="date" id="start_date" name="start_date" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- الشريحة المؤمن عليها --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="insured_sim"
                style="margin-bottom: 0; margin-left: 10px; min-width: 150px; white-space: nowrap;">
                الشريحة المؤمن عليها
            </label>
            <input type="number" id="insured_sim" name="insured_sim" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>
</div>

                             <div class="row">
    <!-- اسم شركة التأمين -->
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="insurance_company_name" style="margin-bottom: 0; margin-left: 10px; min-width: 120px;">

                اسم شركة التأمين
            </label>
            <input type="text" id="insurance_company_name" name="insurance_company_name"
                class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    <!-- قيمة قسط التأمين -->
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="medical_insurance_premium_value" style="margin-bottom: 0; margin-left: 10px; min-width: 120px;">

                قيمة قسط التأمين
            </label>
            <input type="number" id="medical_insurance_premium_value" name="medical_insurance_premium_value"
                class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    <!-- تاريخ الفصل -->
    <div class="col-md-3">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="end_date" style="margin-bottom: 0; margin-left: 10px; min-width: 120px;">

                تاريخ الفصل
            </label>
            <input type="date" id="end_date" name="end_date"
                class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>
</div>

                            </div>
                            <!-- البيانات المالية -->
                      <div class="form-section"
    style="margin-bottom: 30px; border-bottom: 2px solid #f5f5f5; padding-bottom: 20px;">
    <h5 style="color: #2c5a9d; font-weight: bold; margin-bottom: 20px;">
        <i class="la la-money"></i> البيانات المالية
    </h5>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group d-flex align-items-center">
                <label for="bank_account_number" style="min-width: 120px; margin-bottom: 0;">رقم الحساب البنكي</label>
                <input type="number" id="bank_account_number" name="bank_account_number" class="form-control"
                    style="border: none; border-bottom: 1px solid #ccc; height: 40px;">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group d-flex align-items-center">
                <label for="issuing_bank_name" style="min-width: 120px; margin-bottom: 0;">بنك مصدر الحساب</label>
                <input type="text" id="issuing_bank_name" name="issuing_bank_name" class="form-control"
                    style="border: none; border-bottom: 1px solid #ccc; height: 40px;">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group d-flex align-items-center">
                <label for="account_opening_branch" style="min-width: 120px; margin-bottom: 0;">فرع فتح الحساب</label>
                <input type="text" id="account_opening_branch" name="account_opening_branch" class="form-control"
                    style="border: none; border-bottom: 1px solid #ccc; height: 40px;">
            </div>
        </div>
         <div class="col-md-4">
            <div class="form-group d-flex align-items-center">
                <label for="total_salary" style="min-width: 120px; margin-bottom: 0;">اجمالي الراتب </label>
                <input type="number" id="total_salary" name="total_salary" class="form-control"
                    style="border: none; border-bottom: 1px solid #ccc; height: 40px;">
            </div>
        </div>
    </div>

</div>


                        <!-- المستندات المرفقة -->
<div class="form-section" style="margin-bottom: 30px;">
    <h5 style="color: #2c5a9d; font-weight: bold; margin-bottom: 20px;">
        <i class="la la-paperclip"></i> المستندات المرفقة
    </h5>
    <div class="row">

        <div class="col-md-3">
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="qualification" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة المؤهل
                </label>
                <input type="file" id="qualification" name="qualification"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="birth_certificate" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة شهادة الميلاد
                </label>
                <input type="file" id="birth_certificate" name="birth_certificate"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="front_national_id" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة البطاقة الشخصية (وجه)
                </label>
                <input type="file" id="front_national_id" name="front_national_id"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="back_national_id" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة البطاقة الشخصية (ظهر)
                </label>
                <input type="file" id="back_national_id" name="back_national_id"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="military_certificate" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة شهادة التجنيد
                </label>
                <input type="file" id="military_certificate" name="military_certificate"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>
 <div class="col-md-3">
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="brent_insurance" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة  برنت تامين
                </label>
                <input type="file" id="brent_insurance" name="brent_insurance"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>
         <div class="col-md-3">
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="employment_contract" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                     صورة كعب العمل
                </label>
                <input type="file" id="employment_contract" name="employment_contract"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>
  <div class="col-md-3">
    <div class="form-group">
        <label for="experience_certificate" style="margin-bottom: 5px; min-width: 100px;">
            شهادات الخبرة
        </label>
        <input type="file" id="experience_certificate" name="experience_certificate[]"
            class="form-control" accept="image/*" multiple
            style="border: none; border-bottom: 1px solid #ddd; padding: 5px;">
        <small class="form-text text-muted" style="color: #888;">
            يمكنك إضافة أكثر من صورة.
        </small>
    </div>
</div>

    </div>
</div>


                            <!-- أزرار الحفظ والإلغاء -->
                            <div class="form-actions"
                                style="text-align: left; margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">
                                <button type="submit" class="btn btn-primary"
                                    style="padding: 10px 30px; font-weight: bold;">
                                    <i class="la la-check"></i> حفظ البيانات
                                </button>
                                <button type="reset" class="btn btn-outline-secondary"
                                    style="padding: 10px 30px; margin-right: 10px;">
                                    <i class="la la-close"></i> إلغاء
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
<style>
    /* الكود الحالي... */

    /* إضافة أنماط التركيز للحقول */
    .form-control:focus {
        border-bottom: 2px solid #4a90e2 !important;
        background-color: #f8fbff !important;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="email"]:focus,
    input[type="file"]:focus,
    select:focus {
        outline: none;
        border-bottom: 2px solid #4a90e2 !important;
        background-color: #f8fbff !important;
    }
</style>
    <style>
        .required:after {
            content: " *";
            color: red;
        }

        .form-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .form-section h5 {
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .form-control {
            border-radius: 0;
            background-color: transparent;
        }

        .form-control:focus {
            border-bottom: 1px solid #2c5a9d;
            box-shadow: none;
        }

        .card {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 500;
            color: #555;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        input,
        select {
            transition: border-color 0.3s ease;
        }
    </style>
    <script>
    document.getElementById('release_date').addEventListener('change', function () {
        let releaseDate = new Date(this.value);
        if (!isNaN(releaseDate)) {
            let expireDate = new Date(releaseDate);
            expireDate.setFullYear(releaseDate.getFullYear() + 7);

            let yyyy = expireDate.getFullYear();
            let mm = String(expireDate.getMonth() + 1).padStart(2, '0');
            let dd = String(expireDate.getDate()).padStart(2, '0');

            document.getElementById('national_number_expire_date').value = `${yyyy}-${mm}-${dd}`;
        }
    });
</script>

@endsection
