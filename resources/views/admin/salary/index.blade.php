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
                                                <th>بدل سكن</th>
                                                <th>بدل وجبات</th>
                                                <th>جزاءات</th>
                                                <th>مكافآت</th>
                                                <th>الراتب النهائي</th>
                                                <th>ملحوظة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($salaryRecords as $salaryRecord)
                                                @php
                                                    // get total salary
                                                    $salaryValue = $salaryRecord->total_salary ?? 0;

                                                    $total_penalties = $salaryRecord->employee->penalities->sum('value') ?? 0;

                                                    $salaryDate = \Carbon\Carbon::parse($salaryRecord->date);

                                                    $total_commissions = $salaryRecord->employee
                                                    ->commissions()
                                                    ->whereBetween('commission_date', [
                                                        $salaryDate->copy()->startOfMonth(),
                                                        $salaryDate->copy()->endOfMonth(),
                                                    ])
                                                    ->sum('value') ?? 0;

                                                    $final_salary = $salaryValue + $total_commissions - $total_penalties;
                                                @endphp
                                                <tr>
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> {{ $salaryRecord->employee->code }} </td>
                                                    <td>
                                                        {{ $salaryRecord->employee->first_name . " " . $salaryRecord->employee->last_name }}
                                                    </td>
                                                    <td> {{ number_format($salaryRecord->total_salary, 2) }} </td>
                                                    <td> {{ number_format($salaryRecord->main_salary, 2) }} </td>
                                                    <td> {{ number_format($salaryRecord->transfer_allowance, 2) }} </td>
                                                    <td> {{ number_format($salaryRecord->housing_allowance, 2) }} </td>
                                                    <td> {{ number_format($salaryRecord->meal_allowance, 2) }} </td>
                                                    <td> {{ number_format($total_penalties, 2) }} </td>
                                                    <td> {{ number_format($total_commissions, 2) }} </td>
                                                    <td> <strong> {{ number_format($final_salary, 2) }} </strong> </td>
                                                    <td> {{ $salaryRecord->note ?? '-' }} </td>
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
                        success: function(response) {
                            if (response.success) {
                                swal("تم الحذف!", "تم حذف الموظف بنجاح", "success")
                                    .then(() => location.reload());
                            } else {
                                swal("خطأ", "فشل في حذف الموظف", "error");
                            }
                        },
                        error: function() {
                            swal("خطأ", "حدث خطأ أثناء تنفيذ العملية", "error");
                        }
                    });
                }
            });
        }
    </script>
@endsection
