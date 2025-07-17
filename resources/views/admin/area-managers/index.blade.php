@extends('admin.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">مديرين المناطق</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#" data-toggle="modal" data-target="#addArea_ManagersModal">إضافة مدير منطقة جديد</a>
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
                            <table class="table table-striped table-bordered dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>ت</th>
                                        <th>اسم مدير المنطقة</th>
                                        <th>خيارات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($index->isEmpty())
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <div class="alert alert-info m-0">لا توجد مديرين مناطق لعرضها</div>
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($index as $area_managers)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $area_managers->name }}</td>
                                        <td>
                                            <button class="btn btn-secondary btn-min-width mr-1 mb-1 edit-btn"
                                                data-toggle="modal"
                                                data-target="#editArea_ManagersModal"
                                                data-id="{{ $area_managers->id }}"
                                                data-name="{{ $area_managers->name }}">
                                                <i class="ft-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-min-width btn-glow mr-1 mb-1 delete-btn"
                                                data-id="{{ $area_managers->id }}">
                                                <i class="ft-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ت</th>
                                        <th>اسم مدير المنطقة</th>
                                        <th>خيارات</th>
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
<div class="modal fade" id="addArea_ManagersModal" tabindex="-1" role="dialog" aria-labelledby="addArea_ManagersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <h6 class="modal-title mb-0" id="addArea_ManagersModalLabel">
                    <i class="la la-plus"></i> إضافة مدير منطقة
                </h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <form id="addArea_ManagersForm" method="POST" action="{{ route('area-managers.store') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="small font-weight-bold">اسم مدير المنطقة</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" required>
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
<div class="modal fade" id="editArea_ManagersModal" tabindex="-1" role="dialog" aria-labelledby="editArea_ManagersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white py-2">
                <h6 class="modal-title mb-0" id="editArea_ManagersModalLabel">
                    <i class="la la-edit"></i> تعديل مدير المنطقة
                </h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <form id="editArea_ManagersForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="edit_name" class="small font-weight-bold">اسم مدير المنطقة</label>
                        <input type="text" class="form-control form-control-sm" id="edit_name" name="name" required>
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
        $('#editArea_ManagersModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var modal = $(this);

            modal.find('#edit_name').val(name);
            modal.find('#editArea_ManagersForm').attr('action', '/admin/area-managers/' + id);
        });

        // معالجة إرسال فورم الإضافة
        $('#addArea_ManagersForm').on('submit', function(e) {
            e.preventDefault();
            handleFormSubmit($(this));
        });

        // معالجة إرسال فورم التعديل
        $('#editArea_ManagersForm').on('submit', function(e) {
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
            deleteArea_Managers(id);
        });

        function deleteArea_Managers(id) {
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
                    const url = "{{ route('area-managers.destroy', ':id') }}".replace(':id', id);

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
