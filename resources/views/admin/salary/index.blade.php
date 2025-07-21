@extends('admin.layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">كشف مرتبات الموظفين لهذا الشهر</h3>
        </div>
    </div>



    <div class="content-body">
        <section id="column-selectors">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped table-bordered dataex-html5-selectors">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>كود الموظف</th>
                                                <th>اسم الموظف</th>
                                                <th>اجمالي الراتب</th>
                                                <th>الراتب الاساسي</th>
                                                <th>بدل انتقال</th>
                                                <th>بدل اخر</th>
                                                <th>جزاءات</th>
                                                <th>مكافآت</th>
                                                <th>الراتب النهائي</th>
                                                <th>ملحوظة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($index as $employee)
                                              @php
        $salary = $employee->salary ?? 0;
        $basic = $salary * 0.5;
        $housing = $salary * 0.3;
        $transport = $salary * 0.2;

        $total_deductions = $employee->deductions->sum('amount');
        $total_penalties = $employee->penalties->sum('amount');
        $total_rewards = $employee->rewards->sum('amount');

        $final_salary = $basic + $housing + $transport + $total_rewards - $total_deductions - $total_penalties;
    @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $employee->employee_code }}</td>
                                                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                                    <td>{{ number_format($basic, 2) }}</td>
        <td>{{ number_format($housing, 2) }}</td>
        <td>{{ number_format($transport, 2) }}</td>
        <td>{{ number_format($total_rewards, 2) }}</td>
        <td>{{ number_format($total_deductions, 2) }}</td>
        <td>{{ number_format($total_penalties, 2) }}</td>
        <td><strong>{{ number_format($final_salary, 2) }}</strong></td>
                                                    <td>{{ $employee->note ?? '-' }}</td>
                                                </tr>
                                            @endforeach
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
