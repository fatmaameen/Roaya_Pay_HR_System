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
                                                        style="margin-bottom: 0; margin-left: 10px; min-width: 80px;">الاسم
                                                        الأول</label>
                                                    <input type="text" id="first_name" name="first_name"
                                                        class="form-control" required
                                                        style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
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
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" style="display: flex; align-items: center;">
                                                    <label for="religion"
                                                        style="margin-bottom: 0; margin-left: 10px; min-width: 60px;">الديانة</label>
                                                    <select id="religion" name="religion" class="form-control"
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
                                                    <input type="text" id="national_id_number" name="national_id_number"
                                                        class="form-control" required
                                                        style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="national_id_number" class="required"
                                                            style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                                                            تاريخ الاصدار</label>
                                                        <input type="date" id="national_id_number"
                                                            name="national_id_number" class="form-control" required
                                                            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
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
                                                <div class="col-md-3">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="governorate" class="required"
                                                            style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">محافظة
                                                            الإصدار</label>
                                                        <select id="governorate" name="governorate"
                                                            class="form-control select2" required style="flex-grow: 1;">
                                                            <option value="">اختر </option>
                                                            @foreach ($governorates as $gov)
                                                                <option value="{{ $gov }}">{{ $gov }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="birth_date"
                                                            style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">الجنسية</label>
                                                        <input type="text" name="nationality" class="form-control"
                                                            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="birth_date"
                                                            style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">تاريخ
                                                            الميلاد</label>
                                                        <input type="date" id="birth_date" name="birth_date"
                                                            class="form-control"
                                                            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group" style="display: flex; align-items: center;">
                                                        <label for="birth_date"
                                                            style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">محل
                                                            الميلاد</label>
                                                        <input type="text" name="nationality" class="form-control"
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
            <input type="file" name="national_id_number" id="national_id_number" class="form-control"
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
                                            <input type="text" id="phone" name="" class="form-control"
                                                required
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label for="email"
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 120px;">المركز/الحي
                                                </label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>
                                       <div class="col-md-3">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label for="address"
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 60px;">المحافظة</label>
                                            <input type="text" id="address" name="address" class="form-control"
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
    {{-- رقم الهاتف الشخصي --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="personal_phone" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                رقم الهاتف الشخصي
            </label>
            <input type="text" name="personal_phone" id="personal_phone" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- رقم هاتف من الشركة --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="company_phone" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                رقم هاتف من الشركة
            </label>
            <input type="text" name="company_phone" id="company_phone" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- رقم القريب الأول --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="relative1_phone" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                رقم القريب الأول
            </label>
            <input type="text" name="relative1_phone" id="relative1_phone" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- درجة القرابة 1 --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="relative1_relation" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                درجة القرابة 1
            </label>
            <input type="text" name="relative1_relation" id="relative1_relation" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- رقم القريب الثاني --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="relative2_phone" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                رقم القريب الثاني
            </label>
            <input type="text" name="relative2_phone" id="relative2_phone" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- درجة القرابة 2 --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="relative2_relation" style="margin-bottom: 0; margin-left: 10px; min-width: 130px; white-space: nowrap;">
                درجة القرابة 2
            </label>
            <input type="text" name="relative2_relation" id="relative2_relation" class="form-control"
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
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 80px;">اسم
                                                الوظيفة</label>
                                            <input type="text" id="job_name" name="job_name" class="form-control"
                                                required
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label for="department" class="required"
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 50px;">القسم</label>
                                            <input type="text" id="department" name="department" class="form-control"
                                                required
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label for="branch"
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 50px;">الفرع</label>
                                            <input type="text" id="branch" name="branch" class="form-control"
                                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                        </div>
                                    </div>
                                        <div class="col-md-3">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label for="hiring_date" class="required"
                                                style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">تاريخ
                                                التعيين</label>
                                            <input type="date" id="hiring_date" name="hiring_date"
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
        <label for="degree"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            المؤهل الدراسي
        </label>
        <input type="text" id="degree" name="degree" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

<div class="col-md-5">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="major"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            التخصص العلمي
        </label>
        <input type="text" id="major" name="major" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

<div class="col-md-3">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="graduation_date"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            سنة التخرج
        </label>
        <input type="date" id="graduation_date" name="graduation_date" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="qualification_from"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            جهة المؤهل
        </label>
        <input type="text" id="qualification_from" name="qualification_from" class="form-control"
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
        <label for="degree"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
             الرقم التاميني
        </label>
        <input type="text" id="degree" name="degree" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="major"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
             تاريخ البداية
        </label>
        <input type="date" id="major" name="major" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>

<div class="col-md-3">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="graduation_date"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            الوظيفة المؤمن عليها
        </label>
        <input type="text" id="graduation_date" name="graduation_date" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>


<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="qualification_from"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            التابع لتامينات
        </label>
        <input type="text" id="qualification_from" name="qualification_from" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>
<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="qualification_from"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
            قيمة قسط التامين
        </label>
        <input type="text" id="qualification_from" name="qualification_from" class="form-control"
            style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
    </div>
</div>
<div class="col-md-4">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="qualification_from"
            style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
             تاريخ الفصل
        </label>
        <input type="date" id="qualification_from" name="qualification_from" class="form-control"
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
            <label for="bank_name"
                style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
                رقم الوثيقة
            </label>
            <input type="text" id="bank_name" name="bank_name" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- تاريخ البداية --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="account_number"
                style="margin-bottom: 0; margin-left: 10px; min-width: 120px; white-space: nowrap;">
                تاريخ البداية
            </label>
            <input type="date" id="account_number" name="account_number" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    {{-- الشريحة المؤمن عليها --}}
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="insurance_number"
                style="margin-bottom: 0; margin-left: 10px; min-width: 150px; white-space: nowrap;">
                الشريحة المؤمن عليها
            </label>
            <input type="text" id="insurance_number" name="insurance_number" class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>
</div>

                             <div class="row">
    <!-- اسم شركة التأمين -->
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="insurance_company" style="margin-bottom: 0; margin-left: 10px; min-width: 120px;">

                اسم شركة التأمين
            </label>
            <input type="text" id="insurance_company" name="insurance_company"
                class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    <!-- قيمة قسط التأمين -->
    <div class="col-md-4">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="insurance_amount" style="margin-bottom: 0; margin-left: 10px; min-width: 120px;">

                قيمة قسط التأمين
            </label>
            <input type="text" id="insurance_amount" name="insurance_amount"
                class="form-control"
                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
        </div>
    </div>

    <!-- تاريخ الفصل -->
    <div class="col-md-3">
        <div class="form-group" style="display: flex; align-items: center;">
            <label for="insurance_termination_date" style="margin-bottom: 0; margin-left: 10px; min-width: 120px;">

                تاريخ الفصل
            </label>
            <input type="date" id="insurance_termination_date" name="insurance_termination_date"
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
        <div class="col-md-3">
            <div class="form-group d-flex align-items-center">
                <label for="account_number" style="min-width: 120px; margin-bottom: 0;">رقم الحساب البنكي</label>
                <input type="text" id="account_number" name="account_number" class="form-control"
                    style="border: none; border-bottom: 1px solid #ccc; height: 40px;">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group d-flex align-items-center">
                <label for="bank_name" style="min-width: 120px; margin-bottom: 0;">بنك مصدر الحساب</label>
                <input type="text" id="bank_name" name="bank_name" class="form-control"
                    style="border: none; border-bottom: 1px solid #ccc; height: 40px;">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group d-flex align-items-center">
                <label for="bank_branch" style="min-width: 120px; margin-bottom: 0;">فرع فتح الحساب</label>
                <input type="text" id="bank_branch" name="bank_branch" class="form-control"
                    style="border: none; border-bottom: 1px solid #ccc; height: 40px;">
            </div>
        </div>
         <div class="col-md-3">
            <div class="form-group d-flex align-items-center">
                <label for="basic_salary" style="min-width: 120px; margin-bottom: 0;">الراتب الأساسي</label>
                <input type="text" id="basic_salary" name="basic_salary" class="form-control"
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
                <label for="qualification_photo" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة المؤهل
                </label>
                <input type="file" id="qualification_photo" name="qualification_photo"
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
                <label for="id_front" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة البطاقة الشخصية (وجه)
                </label>
                <input type="file" id="id_front" name="id_front"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="id_back" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة البطاقة الشخصية (ظهر)
                </label>
                <input type="file" id="id_back" name="id_back"
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
                <label for="military_certificate" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                    صورة  برنت تامين
                </label>
                <input type="file" id="military_certificate" name="military_certificate"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>
         <div class="col-md-3">
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="military_certificate" style="margin-bottom: 0; margin-left: 10px; min-width: 100px;">
                     صورة كعب العمل
                </label>
                <input type="file" id="military_certificate" name="military_certificate"
                    class="form-control" accept="image/*"
                    style="border: none; border-bottom: 1px solid #ddd; padding: 5px; flex-grow: 1;">
            </div>
        </div>
  <div class="col-md-3">
    <div class="form-group">
        <label for="military_certificate" style="margin-bottom: 5px; min-width: 100px;">
            شهادات الخبرة
        </label>
        <input type="file" id="military_certificate" name="military_certificate[]"
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
@endsection
