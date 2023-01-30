@extends('layouts.jsm')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">จัดการสมาชิก</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table yajra-datatable" id="example" width="100%" cellspacing="0" style="text-align: center;">
                    <thead>
                        <tr class="center">
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">คุณต้องการ Reset Password Email ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="text-danger">กรุณาใช้เป็นตัวอักษรภาษาอังกฤษพิมพ์ใหญ่ และตัวเลขเท่านั้น</span>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="text" class="form-control" id="password" oninput="validateAlphadep();">
                        <input type="hidden" class="form-control" id="id">
                      </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-primary btn-save">บันทึก</a>
                </div>
            </div>
        </div>
    </div>








</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>


function validateAlphadep(){
    var textInput = document.getElementById("password").value;
    textInput = textInput.replace(/[^A-Z0-9]/g, "");
    document.getElementById("password").value = textInput;
}

function RefreshTable(data) {


data._token = "{{ csrf_token() }}";
        return data;

}

function reloadData() {

table.ajax.reload(null, false);
}

function fitter() {

table.ajax.reload(null, false);
}

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

        var searchData = {};

        var table = $('.yajra-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url:  "{!! route('users.data') !!}",
        method: 'POST',
        data: RefreshTable,
    },
    columns: [
        {data: 'id'},
        {data: 'fname'},
        {data: 'lname'},
        {data: 'email'},
        {data: 'status'},
        {data: 'action', name: 'action', orderable:false, serachable:false},

    ],catch (Error) {
                if (typeof console != "undefined") {
                    console.log(Error);
                }
    },
    columnDefs: [{
                targets: [0,4,5],
            },


                {
                    targets: 4,
                    orderable: true,
                    searchable: true,
                    render: function (data, type, row) {
                        if(row.status == 'R'){

var btnEdit = '<button type="button" class="btn btn-outline-danger btn-sm"    class="btn-modal">แจ้งลืมรหัส</button>';

}else {

var btnEdit = '<button type="button" class="btn btn-outline-info btn-sm"  class="btn-modal">ใช้งาน</button>';

}

return btnEdit;
                    }
                },

            {
                    targets: 5,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {

                        var dataid = row.id;

                        var btnEdit = '<button type="button" class="btn btn-outline-warning btn-sm btn-show-mo" data-toggle="modal" data-id="'+dataid+'"  class="btn-modal">ส่งรหัสกลับ</button>';


                         return btnEdit;
                    }
                },
        ]


});


$('body').on('click', '.btn-show-mo', function() {
    var id = $(this).attr('data-id');
    $('#id').val(id);
    $("#resetModal").modal()



});

$('body').on('click', '.btn-save', function() {
var id = $('#id').val();
var password = $('#password').val();

if(password == ''){
   return swal("กรอกรหัสผ่าน", "กรอกรหัสผ่าน!", "error");
}


if (password.length < 7) {
    return swal("กรอกรหัสผ่าน ต้องไม่น้อยกว่า 6", "กรอกรหัสผ่าน ต้องไม่น้อยกว่า 6!", "error");
}

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{ csrf_token() }}';

$.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{id:id,password:password,'_token': token},
                    url: '/admin/reset',
                    success: function(datas){
                        $("#resetModal").modal('hide')
table.ajax.reload();

                    }
                })

});




        </script>
@endsection


