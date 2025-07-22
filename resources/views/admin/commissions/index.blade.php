@extends('admin.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block"> العمولات </h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#" data-toggle="modal" data-target="#addComissionModal">إضافة عمولة جديدة</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    {{-- عرض جميع العمولات --}}
    <div class="content-body">
        <section id="column-selectors">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">عرض جميع العمولات</h4>
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
                                <table class="table table-striped table-bordered dataex-html5-selectors">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> كود الموظف </th>
                                            <th> اسم الموظف </th>
                                            <th> قيمة العمولة </th>
                                            <th> مطبق علي شهر </th>
                                            <th> تاريخ العمولة </th>
                                            <th>ملحوظة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($commissions->isEmpty())
                                            <tr>
                                                <td colspan="20" class="text-center">
                                                    <div class="alert alert-info m-0">لا توجد عمولات لعرضها</div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($commissions as $commission)
                                                <tr>
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> {{ $commission->employee->code }} </td>
                                                    <td>
                                                        {{ $commission->employee->first_name . ' ' . $commission->employee->last_name }}
                                                    </td>
                                                    <td> {{ $commission->value }} </td>
                                                    <td> {{ $commission->on_month }} </td>
                                                    <td> {{ $commission->commission_date }} </td>
                                                    <td> {{ $commission->note }} </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center" colspan="20">
                                                شركة رؤية للمدفوعات والبرمجيات
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal للإضافة -->
    <div class="modal fade" id="addComissionModal" tabindex="-1" role="dialog" aria-labelledby="addComissionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white py-2">
                    <h6 class="modal-title mb-0" id="addComissionModalLabel">
                        <i class="la la-plus"></i> إضافة عمولة
                    </h6>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">

                    <form id="addBranchForm" method="POST" action="{{ route('commissions.store') }}">
                        @csrf

                        <div class="form-group mb-2">
                            <label for="name" class="small font-weight-bold">اسم الموظف</label>
                            <select id="employee_id" name="employee_id" class="form-control" required
                                style="border: none; border-bottom: 1px solid #ddd; height: 40px; flex-grow: 1;">
                                <option value="">اختر </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{ $employee->first_name . ' ' . $employee->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="name" class="small font-weight-bold"> قيمة العمولة </label>
                            <input type="number" class="form-control form-control-sm" id="name" name="value"
                                required step="0.001">
                        </div>
                        <div class="form-group mb-2">
                            <label for="name" class="small font-weight-bold"> شهر التطبيق </label>
                            <input type="month" class="form-control form-control-sm" id="name" name="on_month"
                                required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="name" class="small font-weight-bold"> تاريخ العمولة </label>
                            <input type="date" class="form-control form-control-sm" id="name" name="commission_date"
                                required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="name" class="small font-weight-bold"> ملاحظة </label>
                            <input type="text" class="form-control form-control-sm" id="name" name="note"
                                required>
                        </div>

                        <div class="modal-footer p-0 pt-2 border-0">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-sm btn-primary">حفظ</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal للتعديل -->
    <div class="modal fade" id="editCommissionModal" tabindex="-1" role="dialog"
        aria-labelledby="editCommissionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white py-2">
                    <h6 class="modal-title mb-0" id="editCommissionModalLabel">
                        <i class="la la-edit"></i> تعديل الفرع
                    </h6>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <form id="editBranchForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="edit_name" class="small font-weight-bold">اسم الفرع</label>
                            <input type="text" class="form-control form-control-sm" id="edit_name" name="name"
                                required>
                        </div>
                        <div class="modal-footer p-0 pt-2 border-0">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-sm btn-warning">تحديث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendors/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // تهيئة مودال التعديل عند الظهور
            $('#editCommissionModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var name = button.data('name');
                var modal = $(this);

                modal.find('#edit_name').val(name);
                modal.find('#editBranchForm').attr('action', '/admin/branches/' + id);
            });

            // معالجة إرسال فورم الإضافة
            $('#addBranchForm').on('submit', function(e) {
                e.preventDefault();
                handleFormSubmit($(this));
            });

            // معالجة إرسال فورم التعديل
            $('#editBranchForm').on('submit', function(e) {
                e.preventDefault();
                handleFormSubmit($(this));
            });

            // دالة عامة لمعالجة إرسال الفورم
            function handleFormSubmit(form) {
                var url = form.attr('action');
                var method = form.attr('method');
                var submitBtn = form.find('button[type="submit"]');

                $.ajax({
                    type: method,
                    url: url,
                    data: form.serialize(),
                    beforeSend: function() {
                        submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).html(method === 'POST' ? 'حفظ' : 'تحديث');
                    },
                    success: function(response) {
                        $('.modal').modal('hide');
                        showSuccessAlert(response.message || 'تمت العملية بنجاح');
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function(xhr) {
                        showErrorAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء العملية');
                    }
                });
            }

            // معالجة حدث الحذف
            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                deleteBranch(id);
            });

            function deleteBranch(id) {
                Swal.fire({
                    title: 'هل أنت متأكد؟',
                    text: "لن تتمكن من التراجع عن هذا!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم، احذفه!',
                    cancelButtonText: 'إلغاء'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // استخدم اسم الراوت بدلاً من URL ثابت
                        const url = "{{ route('branches.destroy', ':id') }}".replace(':id', id);

                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire('تم الحذف!', response.message, 'success')
                                    .then(() => window.location.reload());
                            },
                            error: function(xhr) {
                                Swal.fire('خطأ!', xhr.responseJSON?.message || 'حدث خطأ',
                                    'error');
                            }
                        });
                    }
                });
            }
            // دالة لعرض رسالة النجاح
            function showSuccessAlert(message) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: message,
                    showConfirmButton: false,
                    timer: 1500,
                    width: 300
                });
            }

            // دالة لعرض رسالة الخطأ
            function showErrorAlert(message) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: message,
                    showConfirmButton: false,
                    timer: 2000,
                    width: 300
                });
            }
        });
    </script>
@endsection
