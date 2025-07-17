@extends('admin.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">تعديل بيانات تصريح</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('permits.index') }}">جميع التصاريح </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Striped row layout section start -->
        <section id="striped-row-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-icons">تعديل تصريح</h4>
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
                        <div class="card-content collpase show">
                            <div class="card-body">
                                     <form class="form form-horizontal striped-rows form-bordered" method="post" action="{{ route('permits.update', $permit->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-body">


        {{-- نوع التصريح --}}
        <div class="form-group row">
    <label class="col-md-3 label-control">نوع التصريح</label>
    <div class="col-md-9">
       <select name="permit_type_id" required class="form-control">
                    <option value="">--اختر نوع التصريح--</option>
                    @foreach($types as $t)
                        <option value="{{ $t->id }}" {{ old('permit_type_id', $permit->permit_type_id) == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                    @endforeach
                </select>
    </div>
</div>


       <div class="form-group row">
            <label class="col-md-3 label-control">الاسم الكامل</label>
            <div class="col-md-9">
                <input type="text" name="full_name" required class="form-control" placeholder="ادخل الاسم" value="{{ old('full_name', $permit->full_name) }}">
            </div>
        </div>

        {{-- الجنس --}}
        <div class="form-group row">
            <label class="col-md-3 label-control">الجنس</label>
            <div class="col-md-9">
                <select name="gender" required class="form-control">
                    <option value="">-- اختر --</option>
                    <option value="ذكر" {{ old('gender', $permit->gender) == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                    <option value="أنثى" {{ old('gender', $permit->gender) == 'أنثى' ? 'selected' : '' }}>أنثى</option>
                </select>
            </div>
        </div>

 {{-- الجنسية --}}
      @php
$nationalities = [
    "أفغانستانية", "ألبانية", "جزائرية", "أمريكية", "أندورية", "أنغولية",
    "أرجنتينية", "أرمينية", "أسترالية", "النمساوية", "أذربيجانية",
    "باهامية", "بحرينية", "بنغلاديشية", "بيلاروسية", "بلجيكية",
    "بليز", "البولندية", "البرازيلية", "بروناي", "بلغارية", "بوركينا فاسو",
    "بوروندي", "كمبودية", "الكاميرونية", "كندية", "الكاب فيردي", "تشيلي",
    "صينية", "كولومبية", "الكونغولية", "كوستاريكا", "كرواتية", "كوبية",
    "قبرص", "التشيكية", "الدانماركية", "الدومينيكية", "التيجانية", "الإكوادورية",
    "مصرية", "سالوادور", "إستونية", "إثيوبية", "فيجي", "فنلندية","المصرية",
    "فرنسية", "غامبية", "جورجيا", "ألمانية", "غانا", "اليونانية",
    "غرينادا", "غواتيمالا", "غينيا", "غيانا", "هايتي", "هندية",
    "إندونيسية", "إيرانية", /* "عراقية" هنا مش موجودة لأنها هتظهر أولاً */ "أيرلندية", "إيطالية", "جامايكية",
    "يابانية", "الأردنية", "الكازاخستانية", "كينيا", "الكويتية", "لاوس",
    "لاتفية", "لبنانية", "ليبيريا", "ليتوانية", "لوكسمبورغ", "مدغشقر",
    "مالاوي", "مالي", "ماليزيا", "المالديف", "مالي", "المغربية",
    "موزمبيق", "ميانمار", "ناميبيا", "نيبال", "هولندا", "نيوزيلندا",
    "نيكاراجوا", "النيجر", "نيجيريا", "النرويج", "عمان", "باكستان",
    "بنما", "باراغواي", "بيرو", "الفلبين", "بولندا", "البرتغال",
    "قطر", "رومانيا", "روسيا", "رواندا", "السعودية", "السنغال",
    "صربيا", "سيشيل", "سنغافورة", "سلوفاكيا", "سلوفينيا", "جزر سليمان",
    "الصومال", "جنوب أفريقيا", "كوريا الجنوبية", "جنوب السودان", "إسبانيا",
    "سريلانكا", "السودان", "سوري", "السواتي", "السويد", "سويسرا",
    "سوريا", "تايوان", "طاجيكستان", "تنزانيا", "تايلاند", "توغو",
    "تونغا", "ترينيداد وتوباغو", "تونس", "تركيا", "تركمانستان", "أوغندا",
    "أوكرانيا", "الإمارات", "المملكة المتحدة", "الولايات المتحدة", "أوروغواي",
    "أوزبكستان", "فنزويلا", "فيتنام", "اليمن", "زامبيا", "زيمبابوي"
];

// ترتيب باقي الجنسيات أبجدياً
sort($nationalities);

@endphp
   <div class="form-group row">
            <label class="col-md-3 label-control">الجنسية</label>
            <div class="col-md-9">
                <select name="nationality" required class="form-control">
                    <option value="">--اختر الجنسية--</option>
                    <option value="العراقية" {{ old('nationality', $permit->nationality) == 'العراقية' ? 'selected' : '' }}>العراقية</option>
                    @foreach($nationalities as $nat)
                        <option value="{{ $nat }}" {{ old('nationality', $permit->nationality) == $nat ? 'selected' : '' }}>{{ $nat }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- الرقم الوطني / جواز السفر --}}
      <div class="form-group row">
            <label class="col-md-3 label-control">الرقم الوطني / جواز السفر</label>
            <div class="col-md-9">
                <input type="text" name="national_id" class="form-control" value="{{ old('national_id', $permit->national_id) }}" placeholder="ادخل الرقم الوطني / جواز السفر">
            </div>
        </div>


        {{-- جهة العمل --}}
        <div class="form-group row">
            <label class="col-md-3 label-control">جهة العمل</label>
            <div class="col-md-9">
                <select name="orga_id" required class="form-control">
                    <option value="">--اختر جهة العمل--</option>
                    @foreach($orgs as $t)
                        <option value="{{ $t->id }}" {{ old('orga_id', $permit->orga_id) == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- الغرض من الدخول --}}
        <div class="form-group row">
            <label class="col-md-3 label-control">الغرض من الدخول</label>
            <div class="col-md-9">
                <select name="purpose" class="form-control" id="purposeSelect" required>
                    <option value="">-- اختر الغرض --</option>
                    @foreach(['زيارة', 'صيانة', 'مقابلة', 'تدريب', 'عمل رسمي'] as $purpose)
                        <option value="{{ $purpose }}" {{ old('purpose', $permit->purpose) == $purpose ? 'selected' : '' }}>{{ $purpose }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- المناطق المصرح بها --}}
        <div class="form-group row">
            <label class="col-md-3 label-control">المناطق المصرح بها</label>
            <div class="col-md-9">
                <select name="authorized_areas_id" required class="form-control">
                    <option value="">--اختر المنطقة--</option>
                    @foreach($areas as $t)
                        <option value="{{ $t->id }}" {{ old('authorized_areas_id', $permit->authorized_areas_id) == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        {{-- وقت الدخول --}}
       <div class="form-group row">
            <label class="col-md-3 label-control">وقت الابتداء</label>
            <div class="col-md-9">
                <input type="datetime-local" name="entry_time" class="form-control" required value="{{ old('entry_time', \Carbon\Carbon::parse($permit->entry_time)->format('Y-m-d\TH:i')) }}">
            </div>
        </div>

        {{-- وقت الخروج --}}
        <div class="form-group row">
            <label class="col-md-3 label-control">وقت انتهاء الصلاحية</label>
            <div class="col-md-9">
                <input type="datetime-local" name="exit_time" class="form-control" required value="{{ old('exit_time', \Carbon\Carbon::parse($permit->exit_time)->format('Y-m-d\TH:i')) }}">
            </div>
        </div>


        {{-- ملاحظات إضافية --}}
          <div class="form-group row">
            <label class="col-md-3 label-control">ملاحظات إضافية</label>
            <div class="col-md-9">
                <textarea name="notes" class="form-control" rows="5" placeholder="مثال: يتطلب مرافقة">{{ old('notes', $permit->notes) }}</textarea>
            </div>
        </div>

        {{-- صورة شخصية --}}
        <div class="form-group row">
            <label for="photo" class="col-md-3 label-control">صورة شخصية</label>
            <div class="col-md-9">
                <input type="file" name="photo" accept="image/*" class="form-control">
                @if($permit->photo)
                    <img src="{{ asset('photos/' . $permit->photo) }}" width="100" class="mt-2">
                @endif
            </div>
        </div>

     


    </div>

    <div class="form-actions right">
        <button type="submit" class="btn btn-primary">
            <i class="la la-check-square-o"></i> حفظ
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

@endsection
@section('scripts')

@endsection
