@extends('admin.layouts.app')


@section('content')
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">  جميع الوثائق الداعمة للتصريح رقم</h3>
        <div class="row breadcrumbs-top d-inline-block"><h3>{{ $permit->permit_number }} </h3>

        </div>
          <h3 class="content-header-title mb-0 d-inline-block">الاسم كاملا</h3>
        <div class="row breadcrumbs-top d-inline-block"><h3>{{ $permit->full_name }} </h3>

        </div>

        <div class="breadcrumb-wrapper col-12">
            <br>
 <ol class="breadcrumb">
             <li class="breadcrumb-item">
  <a href="#" data-toggle="modal" class="btn btn-primary" data-target="#uploadModal">إضافة ملف جديد</a>
</li>
<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('permit.documents.upload') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="permit_id" value="{{ $permit->id }}">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadModalLabel">إضافة ملف جديد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="document">اختر ملف:</label>
            <input type="file" class="form-control" name="supporting_docs" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">رفع</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
        </div>
      </div>
    </form>
  </div>
</div>

            </ol>
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
                        <th>الملف</th>

                        <th>الاجراءات</th>


                      </tr>
                    </thead>
                    <tbody>
                       <tbody>
    @forelse ($documents as $doc)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <a href="{{ asset('documents/' . $doc) }}" target="_blank">
                    {{ $doc }}
                </a>
            </td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="DeleteRow(event, '{{ $doc }}')">
                    <i class="ft-delete"></i> حذف
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="text-center">لا توجد وثائق حالياً</td>
        </tr>
    @endforelse
</tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                                  <th>ت</th>
                        <th>الملف</th>

                        <th>الاجراءات</th>


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
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function DeleteRow(event, filename) {
    event.preventDefault();
    swal({
        title: "هل أنت متأكد من الحذف؟",
        text: "سيتم حذف الملف نهائيًا",
        icon: "warning",
        buttons: {
            cancel: {
                text: "إلغاء",
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "نعم، حذف",
                visible: true,
                closeModal: false
            }
        }
    }).then((isConfirm) => {
        if (isConfirm) {
            $.ajax({
                url: `{{ route('permit.documents.delete') }}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    permit_id: '{{ $permit->id }}',
                    filename: filename
                },
                success: function(response) {
                    swal("تم الحذف!", "تم حذف الملف بنجاح", "success").then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    swal("خطأ!", "حدث خطأ أثناء الحذف", "error");
                }
            });
        }
    });
}

</script>
@endsection
