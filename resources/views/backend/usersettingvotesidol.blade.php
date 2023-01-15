@extends('layouts.jsm')

@section('content')


<div class="container-fluid">

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">ผู้เข้าประกวด
        </h1>
      <div class="card shadow mb-4">
        <form method="GET"  action="{{ url('/admin/setting/idol') }}" >
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">หัวข้อการเข้าประกวด</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-sm" name="type">
                            <option value="2">ประกวดโชว์ไอดอล</option>
                          </select>
                    </div>
                  </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">ประเภท</label>
                      <div class="col-sm-9">
                        <select class="form-control form-control-sm" name="group_id">
                            <option value="1" @if($group_id == '1') selected @endif>เดี่ยว</option>
                            <option value="2" @if($group_id == '2') selected @endif>กลุ่ม</option>
                          </select>
                      </div>
                    </div>
                  </div>


              </div>

              <button type="submit" class="btn btn-primary mr-2">ค้นหา</button>
        </div>
        </form>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3"  style="text-align:right; margin: 0 0 2% 0;">
            <a href="{{ route('idol.create') }}" class="btn btn-success">
                เพิ่มผู้เข้าประกวด
            </a>
        </div>
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="text-align: center;">
                    <thead>
                        <tr class="center">
                            <th>#</th>
                            <th>รูป</th>
                            <th>ชื่อ</th>
                            <th>หมายเลข</th>
                            <th>เข้าประกวดหัวข้อ</th>
                            <th>ประเภท</th>
                            <th>ปรับ</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($vote as $key => $rs)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center">

                                @if ($rs->image == '')
                                <img class="img-profile"
                                src="/img/image.jpg" width="150" height="100">
                                @else
                                <img class="img-profile"
                                src="/public/product/{{$rs->image}}" width="150" height="100">

                                @endif

                            </td>
                            <td class="text-center">{{$rs->name_des}}</td>
                            <td class="text-center">{{$rs->name}}</td>
                            <td class="text-center">{{$rs->title}}</td>
                            <td class="text-center">

                                @if($rs->group_id == '1')
                            {{'เดี่ยว'}}
                          @else
                          {{'กลุ่ม'}}
                          @endif
                            </td>
                            <td class="text-center" width="20%">
                                @if($min == $rs->sequence)
                                    <button
                                        class="btn btn-outline bg-success border-success text-success-800 btn-icon down"
                                        data-name="cate" data-no="{{ $rs->sequence }}"
                                        data-popup="tooltip"
                                        title="เลื่อนตำแหน่งลง"
                                        data-placement="top"
                                        id="top"
                                        data-original-title="top tooltip">
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </button>
                                @elseif($min < $rs->sequence && $rs->sequence < $count)
                                    <button
                                        class="btn btn-outline bg-success border-success text-success-800 btn-icon up"
                                        data-name="cate" data-no="{{ $rs->sequence }}"
                                        data-popup="tooltip"
                                        title="เลื่อนตำแหน่งขึ้น"
                                        data-placement="bottom"
                                        id="bottom"
                                        data-original-title="bottom tooltip">

                                        <i class="fa fa-arrow-up" aria-hidden="true"></i>

                                    </button>
                                    <button
                                        class="btn btn-outline bg-success border-success text-success-800 btn-icon down"
                                        data-name="cate" data-no="{{ $rs->sequence }}"
                                        data-popup="tooltip"
                                        title="เลื่อนตำแหน่งลง"
                                        data-placement="top"
                                        id="top"
                                        data-original-title="top tooltip">

                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </button>
                                @else
                                    <button
                                        class="btn btn-outline bg-success border-success text-success-800 btn-icon up"
                                        data-name="cate" data-no="{{ $rs->sequence }}"
                                        data-popup="tooltip"
                                        title="เลื่อนตำแหน่งขึ้น"
                                        data-placement="bottom"
                                        id="bottom"
                                        data-original-title="bottom tooltip">
                                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    </button>
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-warning btn-edit" href="{{ url('/admin/setting/idol/'.$rs->id.'/edit') }}"  data-popup="tooltip" title="แก้ไข" data-placement="bottom">
                                    <i class="fas fa-fw fa-wrench"></i>
                                </a>
                                <button class="btn btn-danger btn-delete" data-id="{{ $rs['id']}}" data-popup="tooltip" title="ลบ" data-placement="bottom">
                                    <i class="fas fa-trash"></i>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>


$('body').on('click', '.btn-delete', function (e) {

var id = $(this).attr('data-id');
deleteConf(id);


});

function deleteConf(id) {
swal({
    title: "คุณต้องการลบจริงหรือไม่?",
    text: "ข้อมูลไม่สามารถกู้คืนได้!",
    icon: "warning",
    buttons: [
        'ยกเลิกลบรายการ',
        'ลบรายการ'
    ],
    dangerMode: true,
}).then(function(isConfirm) {
    if (isConfirm) {
        swal({
            title: 'ลบรายการ!',
            text: 'ลบรายการเรียบร้อย',
            icon: 'success'
        }).then(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                dataType: 'json',
                type:'DELETE',
                data:{id:id},
                url: '/admin/setting/idol/' + id,
                success: function(datas){
                    location.reload();
                }
            })


        });
    } else {
        swal("ยกเลิก", "ยกเลิกรายการ", "error");
    }
});
} // error form show text


    $('.up').on('click',function(){
                var no   = $(this).data('no');
                var name = $(this).data('name');

                $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

                $.ajax({
                    type: "PATCH",
                    url: "/admin/sequence/up",
                    data: {no : no,name:name},
                    success: function(rs){
                        swal("Success!", "ทำการเลื่อนตำแหน่งเรียบร้อยแล้ว", "success", {button:false});
                        setTimeout(function() {
                            location.reload();
                        }, 1200);

                    }
                });

            });

            $('.down').on('click',function(){

                var no   = $(this).data('no');
                var name = $(this).data('name');

                $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
                $.ajax({
                    type: "PATCH",
                    url: "/admin/sequence/down",
                    data: {no : no,name:name},
                    success: function(rs){
                        swal("Success!", "ทำการเลื่อนตำแหน่งเรียบร้อยแล้ว", "success", {button:false});
                        setTimeout(function() {
                            location.reload();
                        }, 1200);

                    }
                });
            });


    $(document).ready(function() {
        $('#example').DataTable( {
            "paging":   true,
            "ordering": false,
            "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoEmpty":      "Showing 0 to 0 of 0 entries",
            "searching": true,
            "oLanguage": {
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ เรดคอร์ด",
            "sLengthMenu": "แสดง _MENU_ เรดคอร์ด",
          "sSearch": "ค้นหา :",
          "sEmptyTable": "ไม่มีข้อมูลในตาราง",
          "sLoadingRecords": "Please wait - loading...",
          "oPaginate": {
            "sNext": "ถัดไป",
            "sPrevious": "ก่อนหน้า"
          }
        },
        } );

    } );




        </script>
@endsection


