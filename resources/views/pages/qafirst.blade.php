@extends('layouts.apps3',['page' => 'qa'])

@section('content')
<style>
    .carousel-indicators li {
        width: 10px;
        height: 10px;
        border-radius: 100%;
    }
    .carousel-indicators {
        bottom: -50px;
    }

    .fullscreenDiv {

        width: 100%;
        height: auto;
        bottom: 0px;
        top: 0px;
        left: 0;
        position: absolute;
    }
    .center {
        position: absolute;

        top: 50%;
        left: 50%;
        margin-top: -25px;
        margin-left: -65px;
    }

    .selvote {
        border-style: solid;
        border-color: coral
    }
    .containersss {
        /* height: 100px;
        width: 300px; */
        background: rgb(236, 251, 255);
        /* position: absolute; */
        top: 50%;
        left: 50%;
        /* transform: translate(-50%, -50%); */
        /* border-radius: 10px; */
        box-shadow: 0px 5px 10px -6px rgb(0 0 0 / 50%);
        overflow: hidden;
        display: grid;
        grid-template-columns: 50% 50%;
    }

    .right {
        background: rgb(97, 165, 255);
    }

    .left {
        background: rgb(192, 102, 177);
    }

    .container>div {
        text-align: center;
    }

    .blocl{
        height: 250px;
        background-color: #21A7E1;
        color: white;
        font-size: 50px;
        text-align: center;
    }

    .ssss{

        background-color: white;
    }



     @media (min-width:320px)  {
        .imgs{
        height: 120px;
        }
        .blocl{
        height: 120px;
        background-color: #21A7E1;
        color: white;
        font-size: 30px;
        text-align: center;
    }

      }
    @media (min-width:480px)  {
        .imgs{
        height: 120px;
        }

        .blocl{
        height: 120px;
        background-color: #21A7E1;
        color: white;
        font-size: 30px;
        text-align: center;
    }

     }
    @media (min-width:600px)  {
        .imgs{
        height: 120px;
        }

     }
    @media (min-width:801px)  {
        .blocl{
        height: 250px;
        background-color: #21A7E1;
        color: white;
        font-size: 50px;
        text-align: center;
    }


    }
    @media (min-width:1025px) {
        .imgs{
            height: 200px;
        }
        .blocl{
        height: 200px;
        background-color: #21A7E1;
        color: white;
        font-size: 50px;
        text-align: center;
    }




     }
    @media (min-width:1281px) {
        .imgs{
        height: 250px;
        }
        .blocl{
        height: 250px;
        background-color: #21A7E1;
        color: white;
        font-size: 50px;
        text-align: center;
    }


    }
        </style>



            <div class="row">
                <div class="col-12 help-block-send" style="padding-top: 5px;padding-bottom: 5px">
                <div class="alert alert-success">
                    <p>ส่งข้อมูลเรียบร้อย</p>
                </div>
                </div>

                <div class="col-12 col-md-12" style="padding-top: 5px;padding-bottom: 5px"  onclick="showmodal()">
                    {{-- <div class="card {{ $xx['id'] ==  $datavote['votes_id'] ? 'selvote' : '' }}">
                        <img class="card-img-top imgs" src="/public/product/{{$xx['image']}}" alt="Card image cap">
                    </div> --}}


                      <div class="card blocl">
                        <div class="card-body ssss">
                            <div class="card-body blocl" style="text-align: left;">
                                <span>Q & A</span>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="พิมพ์คำถาม" style="
                                    background-color: #21A7E1;
                                    border-top-color: #21A7E1;
                                    border-left-color: #21A7E1;
                                    border-right-color: #21A7E1
                                " disabled>
                                  </div>
                            </div>

                        </div>
                      </div>

                    </div>


              </div>


              <div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Q & A</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message"></textarea>
                              </div>
                              <div class="help-block-message">กรุณากรอกคำถาม</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary mr-auto btn-save">ส่งคำถาม</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                          </div>
                    </div>
                </div>
            </div>


            <style type="text/css">
                .help-block-message,.help-block-send{
                    display: none;
                    color: red;
                    text-align: center;
                }
            </style>
<script>

    function showmodal()
    {
        $("#send").modal()

    }

    $('body').on('click', '.btn-save', function() {

        var message = $('#message').val();




        if(message == ''){
            $('.help-block-message').show();
                return false;
        }

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var token = '{{ csrf_token() }}';

$.ajax({
    dataType: 'json',
    type: 'POST',
    data: {
        message:message,
        '_token': token
    },
    url: '/saveqa',
    success: function(datas) {

        $('#send').modal("hide");
        var message = $('#message').val('');
        $('.help-block-send').show();

    }
});


//$("#send").modal('hide')
    });

    </script>
@endsection


