@extends('admin.layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">عرض الموظفين</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('employees.create') }}">إضافة موظف جديد</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="column-selectors">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">قائمة الموظفين</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered dataex-html5-selectors">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>كود الموظف</th>
                                            <th>الاسم</th>

                                            <th>الوظيفة</th>
                                             <th>القسم</th>
                                            <th>الفرع</th>

                                            <th>الخيارات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $employee->employee_code }}</td>
                                                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                                <td>{{ $employee->jobDetails->job_name ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->branches->name ?? 'غير محدد' }}</td>
                                                <td>{{ $employee->departments->name ?? 'غير محدد' }}</td>
                                                <td>
                                                    <a href="{{ route('employees.show', $employee->id) }}"
                                                        class="btn btn-sm btn-primary" title="عرض التفاصيل">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                                        class="btn btn-sm btn-info" title="تعديل">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <button onclick="DeleteRow({{ $employee->id }})"
                                                        class="btn btn-danger btn-sm" title="حذف">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        function DeleteRow(id) {
            swal({
                title: "هل انت متأكد من الحذف؟",
                text: "لن تتمكن من استرجاع البيانات!",
                icon: "warning",
                buttons: ["إلغاء", "نعم، احذف!"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // تكوين الرابط الصحيح مع ID الموظف
                    var route = "{{ route('employees.destroy', ['employee' => ':id']) }}";
                    route = route.replace(':id', id);

                    $.ajax({
                        url: route,
                        type: "POST",
                        data: {
                            _method: "DELETE",
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            if (response.success) {
                                swal("تم الحذف!", "تم حذف الموظف بنجاح", "success")
                                    .then(() => location.reload());
                            } else {
                                swal("خطأ", "فشل في حذف الموظف", "error");
                            }
                        },
                        error: function () {
                            swal("خطأ", "حدث خطأ أثناء تنفيذ العملية", "error");
                        }
                    });
                }
            });
        }
    </script>
@endsection
