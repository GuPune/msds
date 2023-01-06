@extends('layouts.jsm')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">ตั้งค่า</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Check the following errors :(  {{$errors->first()}}
    </div>
    @endif
    <div class="card shadow mb-4">

        <div class="card-body">
            <form method="POST" action="{{ route('votes.update',$vote->id) }}" >
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <form>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">หัวข้อประกวด</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="หัวข้อ" value="{{$vote->title}}" required>
                      </div>

                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">เวลาเริ่มต้น</label>
                        <input type="text" format-value="yyyy-MM-ddTHH:mm" class="form-control datetime" id="start" name="start"  value="{{$vote->start}}" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="inputCity">เวลาหยุด</label>
                        <input type="text" format-value="yyyy-MM-ddTHH:mm" class="form-control datetime" id="end" name="end"  value="{{$vote->end}}" required>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                  </form>
        </div>
    </div>










</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>

$('.datetime').datetimepicker({
    format: 'YYYY-DD-MM HH:mm:ss',
    locale: 'en',
    sideBySide: true,
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

var $link = "<?php echo url('/public/product/'); ?>";

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


        $("#product_img").on('change', function(){
            if ($('input[name ="product_img"]').val() != '') {
                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "product_img"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {

                        if((file.type != 'image/jpeg') && (file.type != 'image/png')){
                            return  swal("บันทึกไม่สำเร็จ", "บันทึกไม่สำเร็จ!", "error");
                        }
                        // if((this.width != '400') && (this.height != '400')){
                        //     return  swal("Cancelled", "Upload failed. width,height not 225 ", "error");
                        // }
                        form_data.append('product_img', file_data);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '/admin/uploadimage',
                            dataType: 'json',
                            type: 'POST',
                            data: form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function success(resp) {


                                $('input[name=image]').val(resp.data);
                                $('#showImage').attr("src", $link +'/'+ resp.data);

                                swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");
                                $('.help-block-image').hide();
                            },
                            error: function error(xhr, textStatus, errorThrown) {

                                console.log(errorThrown);
                            }
                        });
                    };
                    img.onerror = function() {
                        alert( "not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            }
        })



        </script>
@endsection


