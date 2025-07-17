@extends('admin.layouts.app')


@section('content')
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block"> المستخدمين </h3>
        <div class="row breadcrumbs-top d-inline-block">
          <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route("users.create") }}">إضافة مستخدم جديد</a>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- HTML5 export buttons table -->
      <!-- Column selectors table -->
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
                      
                        <th>البريد الالكتروني </th>
                        <th>خيارات</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($index as $i)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                <td>{{ $i->email }}</td>
                                            <td>
                                    <a href="{{ route('users.edit' ,$i->id) }}" class="btn btn-secondary btn-min-width mr-1 mb-1"><i
                                        class="ft-edit"></i>تعديل</a>
                                    <input type="hidden" value="{{ csrf_token() }}" id="csrf_token" />

                                        <button class="btn btn-danger btn-min-width btn-glow mr-1 mb-1" onclick="DeleteRow({{$i->id}})"><i
                                            class="ft-delete"></i> حذف</button>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ت</th>

                            <th>البريد الالكتروني </th>
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
      <!--/ Column selectors table -->
</div>


@endsection

<script>
    function DeleteRow(id) {
        event.preventDefault();
        swal({
            title: "هل انت متأكد من الحذف ؟",
            text: "في حالة الموافقة على الحذف سيتم حذف البيانات نهائيا",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "لا أريد الحذف",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: false,
                },
                confirm: {
                    text: "نعم أريد الحذف",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false
                }
            }
        })
        .then((isConfirm) => {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('users.destroy') }}",
                    data: {
                        '_token': $('#csrf_token').val(),
                        'id': id,
                    },
                    success: function(response) {
                        // Check if the delete was successful
                        if (response.success) {
                            // Show the success message
                            swal("تم الحذف!", "البيانات تم حذفها بنجاح", "success")
                                .then(() => {
                                    // Reload the page after showing the success message
                                    location.reload();
                                });
                        } else {
                            swal("خطأ", "حدث خطأ أثناء الحذف", "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        swal("خطأ", "حدث خطأ أثناء الحذف", "error");
                    }
                });
            } else {
                swal("تم الغاء الطلب", "لم يتم حذف الداتا", "error");
            }
        });
    }

</script>



