@extends('admin.layouts.app')
<style>
    @media (max-width: 845px) {
        .card-dashboard .show-important-data > img{
            width: 200px !important;
        }
    }
    @media (max-width: 510px) {
        .card-dashboard .show-important-data{
            flex-direction: column-reverse !important;
            align-items: center;
        }
    }
</style>
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block"> عرض تفاصيل الموظفين</h3>
        </div>
    </div>

    <div class="content-body">
        <section id="column-selectors">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="show-important-data"
                                    style="overflow-x: auto; display: flex;flex-direction:row;justify-content: space-between;">
                                    <table class="table table-striped table-bordered " style="width: 600px;">
                                        <!-- dataex-html5-selectors -->
                                        <tbody>
                                            <tr>
                                                <th style="width: 125px;">كود الموظف</th>
                                                <td>{{ $employee->code }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 125px;">الاسم</th>
                                                <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 125px;">الوظيفة</th>
                                                <td>{{ $employee->jobDetails->job_name ?? 'غير محددة' }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 125px;">الفرع</th>
                                                <td>{{ $employee->branches->name ?? 'غير محدد' }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 125px;">القسم</th>
                                                <td>{{ $employee->departments->name ?? 'غير محدد' }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 125px;">تاريخ التعين</th>
                                                <td>{{ $employee->jobDetail->appointment_date ?? 'غير محدد' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <img src="{{ $employee->photo ?? asset('assets/images/personal-25.svg') }}" width="250">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">تفاصيل الموظفين</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped table-bordered "> <!-- dataex-html5-selectors -->
                                        <caption
                                            style="caption-side: top;border: 2px solid #e3ebf3; border-bottom: 0; text-align: center; font-weight: 800;">
                                            البيانات الأساسية
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th>كود الموظف</th>
                                                <th>الاسم</th>
                                                <th>الوظيفة</th>
                                                <th>الفرع</th>
                                                <th>القسم</th>
                                                <th>الرقم القومي</th>
                                                <th>محافظة الأصدار</th>
                                                <th>الحالة الاجتماعية</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $employee->code }}</td>
                                                <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                                                <td>{{ $employee->jobDetails->job_name ?? 'غير محددة' }}</td>
                                                <td>{{ $employee->branches->name ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->departments->name ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->national_id ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->national_id_governorate ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->marital_status ?? 'غير محدد' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered "> <!-- dataex-html5-selectors -->
                                        <thead>
                                            <tr>
                                                <th>الديانة</th>
                                                <th>تاريخ الاصدار</th>
                                                <th>تاريخ الانتهاء</th>
                                                <th>جهة الاصدار </th>
                                                <th> الجنسية</th>
                                                <th> تاريخ الميلاد</th>
                                                <th> الرقم العسكري </th>
                                                <th> الخدمة العسكرية </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $employee->religious ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->national_id_release_date }}</td>
                                                <td>{{ $employee->national_id_expire_date }}</td>
                                                <td>{{ $employee->national_id_issuing_dep ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->nationality ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->date_of_birth ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->military_number ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->military_service ?? 'غير محدد' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                بيانات التواصل
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped table-bordered "> <!-- dataex-html5-selectors -->
                                        <caption
                                            style="caption-side: top;border: 2px solid #e3ebf3; border-bottom: 0; text-align: center; font-weight: 800;">
                                            بيانات التواصل
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th>العنوان</th>
                                                <th>المحافظة</th>
                                                <th>الحي</th>
                                                <th>الرقم الشخصي</th>
                                                <th>رقم العمل</th>
                                                <th>رقم القريب 1</th>
                                                <th>صلة القرابة 1</th>
                                                <th>رقم القريب 2</th>
                                                <th>صلة القرابة 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $employee->contactInfo->address ?? 'غير محددة' }}</td>
                                                <td>{{ $employee->contactInfo->address ?? 'غير محددة'}}</td>
                                                <td>{{ $employee->contactInfo->neighborhood ?? 'غير محددة' }}</td>
                                                <td>{{ $employee->contactInfo->personal_phone_number ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->contactInfo->company_phone_number ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->contactInfo->first_relative_phone_number ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->contactInfo->first_relative_relation ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->contactInfo->second_relative_phone_number ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->contactInfo->second_relative_relation ?? 'غير محدد' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                البيانات التعليمية
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped table-bordered "> <!-- dataex-html5-selectors -->
                                        <caption
                                            style="caption-side: top;border: 2px solid #e3ebf3; border-bottom: 0; text-align: center; font-weight: 800;">
                                            البيانات التعليمية
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th>المؤهل الدراسي</th>
                                                <th>التخصص العلمي</th>
                                                <th>سنة التخرج</th>
                                                <th>جهة المؤهل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $employee->education->educational_qualification ?? 'غير محددة' }}</td>
                                                <td>{{ $employee->education->specialization ?? 'غير محددة'}}</td>
                                                <td>{{ $employee->education->graduation_year ?? 'غير محددة' }}</td>
                                                <td>{{ $employee->education->qualification_authority ?? 'غير محدد' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                بيانات الرقم التأميني
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped table-bordered "> <!-- dataex-html5-selectors -->
                                        <caption
                                            style="caption-side: top;border: 2px solid #e3ebf3; border-bottom: 0; text-align: center; font-weight: 800;">
                                            بيانات الرقم التأميني
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th> الرقم التاميني </th>
                                                <th> تاريخ البداية</th>
                                                <th>التابع لتامينات </th>
                                                <th>قيمة قسط التامين </th>
                                                <th> تاريخ الفصل </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $employee->insuranceInfo->insurance_number ?? 'غير محددة' }}</td>
                                                <td>{{ $employee->insuranceInfo->insurance_start_date ?? 'غير محددة'}}</td>
                                                <td>{{ $employee->insuranceInfo->insurance_agency ?? 'غير محددة' }}</td>
                                                <td>{{ $employee->insuranceInfo->insurance_premium_value ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->insuranceInfo->insurance_end_date ?? 'غير محدد' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                البيانات المالية
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped table-bordered "> <!-- dataex-html5-selectors -->
                                        <caption
                                            style="caption-side: top;border: 2px solid #e3ebf3; border-bottom: 0; text-align: center; font-weight: 800;">
                                            البيانات المالية
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th> رقم الحساب البنكي </th>
                                                <th> بنك مصدر الحساب </th>
                                                <th>فرع فتح الحساب</th>
                                                <th> اجمالي الراتب </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $employee->bankAccount->bank_account_number ?? 'غير محددة' }}</td>
                                                <td>{{ $employee->bankAccount->issuing_bank_name ?? 'غير محددة'}}</td>
                                                <td>{{ $employee->bankAccount->account_opening_branch ?? 'غير محددة' }}</td>
                                                <td>{{ $employee->salaries->last()->total_salary ?? 'غير محدد' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                المرفقات
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped table-bordered "> <!-- dataex-html5-selectors -->
                                        <caption
                                            style="caption-side: top;border: 2px solid #e3ebf3; border-bottom: 0; text-align: center; font-weight: 800;">
                                            المرفقات
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th>المؤهل</th>
                                                <th>شهادة الميلاد</th>
                                                <th>البطاقة الشخصية (وجه)</th>
                                                <th>البطاقة الشخصية (ظهر)</th>
                                                <th>شهادة التجنيد</th>
                                                <th>برنت تامين</th>
                                                <th> كعب العمل</th>
                                                <th>شهادات الخبرة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->qualification ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->birth_certificate ?? '#'}}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->front_national_id ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->back_national_id ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->military_certificate ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->brent_insurance ?? '#'}}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->employment_contract ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->experience_certificate ?? '#' }}">إضغط هنا</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                History
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped table-bordered "> <!-- dataex-html5-selectors -->
                                        <caption
                                            style="caption-side: top;border: 2px solid #e3ebf3; border-bottom: 0; text-align: center; font-weight: 800;">
                                            History
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th>المؤهل</th>
                                                <th>شهادة الميلاد</th>
                                                <th>البطاقة الشخصية (وجه)</th>
                                                <th>البطاقة الشخصية (ظهر)</th>
                                                <th>شهادة التجنيد</th>
                                                <th>برنت تامين</th>
                                                <th> كعب العمل</th>
                                                <th>شهادات الخبرة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->qualification ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->birth_certificate ?? '#'}}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->front_national_id ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->back_national_id ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->military_certificate ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->brent_insurance ?? '#'}}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->employment_contract ?? '#' }}">إضغط هنا</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $employee->employeeInfo->experience_certificate ?? '#' }}">إضغط هنا</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
