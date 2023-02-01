@extends('layouts.jsm')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">ผู้เข้าประกวด
        </h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Check the following errors :(  {{$errors->first()}}
        </div>
        @endif
      <div class="card shadow mb-4">
        <form method="POST"  action="{{ route('idol.update',$res->id) }}" >
            {{ method_field('PUT') }}
                {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">หัวข้อการเข้าประกวด</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-sm" name="type">
                            <option value="2">MSD NEXT IDOL</option>
                          </select>
                    </div>
                  </div>
                </div>



                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">ประเภท :</label>
                      <div class="col-sm-9">
                        <select class="form-control form-control-sm" name="group_id">
                            <option value="1" @if($res->group_id == "1") selected @endif>MSD NEXT IDOL INDIVIDUAL</option>
                            <option value="2" @if($res->group_id == "2") selected @endif>MSD NEXT IDOL GROUP</option>
                          </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">ชื่อ</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="name_des" name="name_des" aria-describedby="emailHelp" placeholder="Enter Name"  value="{{$res->name_des}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">หมายเลข</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter 00 "  value="{{$res->name}}" required>
                      </div>
                    </div>
                  </div>


                  <div class="form-group" style="padding-left:15px;">
                    <label for="filemagazine"><B>รูปภาพ</B><font color="red">* ขนาดที่แนะนำ 100 * 100 px</font></label><br>
                    <input type="file" name="product_vote" id="product_vote" class="filestyle" ><br>
                    <img src="/public/product/{{$res->image}}" alt="รูปภาพประจำสินค้า" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" width="100" height="100">
                    </div>




                <div class="form-group" style="padding-left:15px;">
                    <label for="filemagazine"><B>รายละเอียด</B></label><br>
                    <div class="col-sm-9">
                        <textarea name="des"  id="des" cols="12" rows="5">{{$res->des}}</textarea>
                      </div>
                </div>



              </div>
              <input type="hidden" name="image" id="image" value="{{$res->image}}" required>
              <button type="submit" class="btn btn-primary mr-2">บันทึก</button>
        </div>
        </form>
    </div>







</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>

var $link = "<?php echo url('/public/product/'); ?>";


$("#product_vote").on('change', function(){
            if ($('input[name ="product_vote"]').val() != '') {
                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "product_vote"]').prop('files')[0];
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
                        form_data.append('product_vote', file_data);
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


