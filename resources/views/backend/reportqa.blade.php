@extends('layouts.jsm')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">รายงาน Q&A</h1>

    <div class="card shadow mb-4">
        <form method="GET"  action="{{ url('/admin/reportqa') }}" >
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">ช่วงเวลา</label>
                      <div class="col-sm-9">
                        <select class="form-control form-control-sm" name="type">
                            <option value="D" @if($type == 'D') selected @endif>เช้า</option>
                            <option value="N" @if($type == 'N') selected @endif>บ่าย</option>
                          </select>
                      </div>
                    </div>
                  </div>
              </div>
              <div>
                @php

                    if($type == ''){
                        $type = 'D';

                    }
                @endphp
                <span style="float: right"><a  href="exportqa/{{$type}}"  class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i> ดาวน์โหลดข้อมูลไฟล์ Excel</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
              <button type="submit" class="btn btn-primary mr-2">ค้นหา</button>
        </div>
        </form>
    </div>



    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="text-align: center;">
                    <thead>
                        <tr class="center">
                            <th>ลำดับ</th>
                            <th>คำถาม</th>
                            <th>เวลาส่ง</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($report as $key => $rs)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center">{{$rs->message}}</td>
                            <td class="text-center">{{$rs->time}}</td>
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
                                url: '/admin/carosel/' + id,

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


        </script>
@endsection


