@extends('admin.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">جزاءات</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#" data-toggle="modal" data-target="#addPenaltyModal">إضافة جزاء جديد</a>
                        </li>
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
                            <h4 class="card-title">عرض الجميع</h4>
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
                                <table class="table table-striped table-bordered dataex-html5-selectors">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>كود الموظف</th>
                                            <th>اسم الموظف</th>
                                            <th>قيمة الجزاء</th>
                                            <th>السبب</th>
                                            <th>تاريخ الخصم</th>
                                            <th>شهر الجزاء</th>
                                            <th>الملاحظة</th>
                                            <th>خيارات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($penalties->isEmpty())
                                            <tr>
                                                <td colspan="9" class="text-center">
                                                    <div class="alert alert-info m-0">لا توجد جزاءات لعرضها</div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($penalties as $penalty)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $penalty->employee->code }}</td>
                                                    <td>{{ $penalty->employee->first_name . ' ' . $penalty->employee->last_name }}</td>
                                                    <td>{{ $penalty->value }}</td>
                                                    <td>{{ $penalty->reason }}</td>
                                                    <td>{{ $penalty->date_of_action }}</td>
                                                    <td>{{ $penalty->on_month }}</td>
                                                    <td>{{ $penalty->note ? $penalty->note : 'لا يوجد ملاحظة'}}</td>
                                                    <td>
                                                        @php
                                                            $penaltyMonth = \Carbon\Carbon::parse($penalty->created_at)->month;
                                                            $currentMonth = \Carbon\Carbon::now()->month;
                                                        @endphp

                                                        @if ($penaltyMonth === $currentMonth)
                                                            <button class="btn btn-secondary btn-min-width mr-1 mb-1 edit-btn"
                                                                data-toggle="modal" data-target="#editPenaltyModal"
                                                                data-id="{{ $penalty->id }}"
                                                                data-user="{{ $penalty->user_id }}"
                                                                data-value="{{ $penalty->value }}"
                                                                data-reason="{{ $penalty->reason }}"
                                                                data-on_month="{{ $penalty->on_month }}">
                                                                <i class="ft-edit"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-min-width mr-1 mb-1 edit-btn"
                                                                data-toggle="modal" data-target="#editPenaltyeditCommentsModal"
                                                                data-id="{{ $penalty->id }}"
                                                                data-username="{{ $penalty->employee->first_name . ' ' . $penalty->employee->last_name . ' - ' . $penalty->employee->code}}"
                                                                data-note="{{ $penalty->note }}">
                                                                <i class="la la-comments"></i>
                                                            </button>
                                                            {{-- <button
                                                                class="btn btn-danger btn-min-width btn-glow mr-1 mb-1 delete-btn"
                                                                data-id="{{ $penalty->id }}">
                                                                <i class="ft-delete"></i>
                                                            </button> --}}
                                                        @else
                                                            <span style="color:brown;">
                                                                لا يمكن التعديل
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>كود الموظف</th>
                                            <th>اسم الموظف</th>
                                            <th>قيمة الجزاء</th>
                                            <th>السبب</th>
                                            <th>تاريخ الخصم</th>
                                            <th>شهر الجزاء</th>
                                            <th>الملاحظة</th>
                                            <th>خيارات</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal للإضافة -->
    <div class="modal fade" id="addPenaltyModal" tabindex="-1" role="dialog" aria-labelledby="addPenaltyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white py-2">
                    <h6 class="modal-title mb-0" id="addPenaltyModalLabel">
                        <i class="la la-plus"></i> إضافة جزاء
                    </h6>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <form id="addPenaltyForm" method="POST" action="{{ route('penalties.store') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="user_id" class="small font-weight-bold">اسم الموظف</label>
                            <select class="form-control form-control-sm" id="user_id" name="user_id" required>
                                <option value="" selected disabled>-</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{$employee->code . '  -  ' . $employee->first_name . ' ' . $employee->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="value" class="small font-weight-bold">قيمة الجزاء </label>
                            <input type="number" class="form-control form-control-sm" id="value" name="value" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="reason" class="small font-weight-bold">السبب</label>
                            <textarea class="form-control form-control-sm" id="reason" name="reason" required></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="on_month" class="small font-weight-bold">في شهر</label>
                            <input type="month" class="form-control form-control-sm" id="on_month" name="on_month" required>
                        </div>
                        {{-- <div class="form-group mb-2">
                            <label for="note" class="small font-weight-bold">الملاحظة</label>
                            <textarea class="form-control form-control-sm" id="note" name="note" rows="6"></textarea>
                        </div> --}}
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
    <div class="modal fade" id="editPenaltyModal" tabindex="-1" role="dialog" aria-labelledby="editPenaltyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white py-2">
                    <h6 class="modal-title mb-0" id="editPenaltyModalLabel">
                        <i class="la la-edit"></i> تعديل الجزاء
                    </h6>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <form id="editPenaltyForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="user_id" class="small font-weight-bold">اسم الموظف</label>
                            <select class="form-control form-control-sm" id="user_id" name="user_id" required>
                                <option value="" disabled>-</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{$employee->code . '  -  ' . $employee->first_name . ' ' . $employee->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="value" class="small font-weight-bold">قيمة الجزاء </label>
                            <input type="number" class="form-control form-control-sm" id="value" name="value" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="reason" class="small font-weight-bold">السبب</label>
                            <textarea class="form-control form-control-sm" id="reason" name="reason" required></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="on_month" class="small font-weight-bold">في شهر</label>
                            <input type="month" class="form-control form-control-sm" id="on_month" name="on_month" required>
                        </div>
                        {{-- <div class="form-group mb-2">
                            <label for="note" class="small font-weight-bold">الملاحظة</label>
                            <textarea class="form-control form-control-sm" id="note" name="note" rows="6"></textarea>
                        </div> --}}
                        <div class="modal-footer p-0 pt-2 border-0">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-sm btn-warning">تحديث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal للتعديل -->
    <div class="modal fade" id="editPenaltyeditCommentsModal" tabindex="-1" role="dialog" aria-labelledby="editPenaltyeditCommentsModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white py-2">
                    <h6 class="modal-title mb-0" id="editPenaltyCommentModalLabel">
                        ملاحظة لجزاء الموظف :-
                        <h5 id="editPenaltyCommentModalSumLabel" style="color: #fff; margin-right: 10px;"> </h5>
                    </h6>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <form id="editPenaltyCommentForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="note" class="small font-weight-bold">الملاحظة</label>
                            <textarea class="form-control form-control-sm" id="note" name="note" rows="9"></textarea>
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
        $(document).ready(function () {
            // تهيئة مودال التعديل عند الظهور
            $('#editPenaltyModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var user = button.data('user');
                var value = button.data('value');
                var reason = button.data('reason');
                var on_month = button.data('on_month');
                var modal = $(this);

                modal.find('#user_id').val(user).trigger('change');
                modal.find('#value').val(value);
                modal.find('#reason').val(reason);
                modal.find('#on_month').val(on_month);
                modal.find('#editPenaltyForm').attr('action', "/admin/penalties/update/" + id);
            });

            // معالجة إرسال فورم الملاحظة
            $('#editPenaltyeditCommentsModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var username = button.data('username');
                var note = button.data('note');
                var modal = $(this);

                modal.find('#editPenaltyCommentModalSumLabel').text(' ' + username);
                modal.find('#note').val(note);
                modal.find('#editPenaltyCommentForm').attr('action', "/admin/penalties/update/note/" + id);

                console.log('فتح');
            });

            // معالجة إرسال فورم الإضافة
            $('#addPenaltyForm').on('submit', function (e) {
                e.preventDefault();
                handleFormSubmit($(this));
            });

            // معالجة إرسال فورم التعديل
            $('#editPenaltyForm').on('submit', function (e) {
                e.preventDefault();
                handleFormSubmit($(this));
            });

            // معالجة إرسال فورم الملاحظة
            $('#editPenaltyCommentForm').on('submit', function (e) {
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
                    beforeSend: function () {
                        submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
                    },
                    complete: function () {
                        submitBtn.prop('disabled', false).html(method === 'POST' ? 'حفظ' : 'تحديث');
                    },
                    success: function (response) {
                        $('.modal').modal('hide');
                        showSuccessAlert(response.message || 'تمت العملية بنجاح');
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function (xhr) {
                        showErrorAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء العملية');
                    }
                });
            }

            // معالجة حدث الحذف
            $(document).on('click', '.delete-btn', function () {
                var id = $(this).data('id');
                deletePenalty(id);
            });

            function deletePenalty(id) {
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
                        const url = "{{ route('penalties.destroy', ':id') }}".replace(':id', id);

                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                Swal.fire('تم الحذف!', response.message, 'success')
                                    .then(() => window.location.reload());
                            },
                            error: function (xhr) {
                                Swal.fire('خطأ!', xhr.responseJSON?.message || 'حدث خطأ', 'error');
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
