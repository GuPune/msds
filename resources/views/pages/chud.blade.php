@extends('layouts.apps3', ['page' => 'chud'])

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
<div class="col-2 col-md-4" style="padding-top: 5px;padding-bottom: 5px">

    </div>
    <div class="col-8 col-md-4" style="padding-top: 5px;padding-bottom: 5px">
        <div class="card-body">
            <input type="hidden" id="headid" name="headid" value="{{$headvote->id}}">
            <input type="hidden" id="id" name="id" value="{{Auth::guard('web')->user()->id}}">

            {{-- <input type="text" id="uservote" name="uservote" value="{{$uservote->votes_id}}"> --}}
            <input type="hidden" id="uservote" name="uservote" value="{{$datavote['user_id']}}">

            {{-- <input type="text" id="start" name="start" value="{{date('d/m/Y H:i:s', strtotime($headvote->start))}}">
            <input type="text" id="end" name="end" value="{{date('d/m/Y H:i:s', strtotime($headvote->end))}}"> --}}

            <input type="hidden" id="start" name="start" value="{{$headvote->start}}">
            <input type="hidden" id="end" name="end" value="{{$headvote->end}}">
            <p style="text-align: center;">{{$headvote->title}}</p>
          </div>
        </div>

        <div class="col-2 col-md-4" style="padding-top: 5px;padding-bottom: 5px">

            </div>
        </div>


        <div style="text-align: right;color: white;">Vote closes in <span id="time">00:00:00</span></div>

<div class="row">

    @foreach($abc as $key => $xx)


    <div class="col-4 col-md-4" style="padding-top: 5px;padding-bottom: 5px" onclick="Addvote({{$xx['id']}});">
        {{-- <div class="card {{ $xx['id'] ==  $datavote['votes_id'] ? 'selvote' : '' }}">
            <img class="card-img-top imgs" src="/public/product/{{$xx['image']}}" alt="Card image cap">
        </div> --}}

        <div class="card blocl {{ $xx['id'] ==  $datavote['votes_id'] ? 'selvote' : '' }}">
            <div class="card-body">
{{$xx['name']}}
            </div>
          </div>
        {{-- <div class="containersss" style="color: #010101;background-color: white;grid-template-columns: {{$xx['perd']}}% {{$xx['vote']}}%;">
            <div class="left">
                <div class="text">
                    <span class="option-size" id="size-one">
                        @if($xx['perd'] == 100)
                        {{'0%'}}
                        @endif
                    </span>
                </div>
            </div>
            <div class="right" >
                <div class="text">
                    <span class="option-size" id="size-two">{{$xx['vote']}}%</span>
                </div>
            </div>
          </div> --}}
        </div>
    @endforeach
{{--
    @foreach($vote as $key => $rs)
    <div class="col-4 col-md-4" style="padding-top: 5px;padding-bottom: 5px" onclick="Addvote({{$rs->id}});">
<div class="card {{ $rs->id ==  $uservote->votes_id ? 'selvote' : '' }}">
    <img class="card-img-top" src="/public/product/{{$rs->image}}" alt="Card image cap">
</div>
</div>
    @endforeach --}}
  </div>


  <div class="modal fade" id="vote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <input type="hidden" id="vote_id" name="vote_id">
            <div class="modal-header" style="justify-content: center;">
                <img id="myImg" src="/aaaa.jpg" alt="Snow" style="width:50%;">
            </div>
            <div class="modal-body">คุณ {{Auth::guard('web')->user()->fname}} ต้องการโหวตให้กับหมายเลข 03 ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-save" href="#">Vote</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="closevote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <img id="myImg" src="/aaaa1.jpg" alt="Snow" style="width:50%;">
            </div>
            <div class="modal-body">ไม่ได้อยู่ในช่วงที่เปิดให้โหวต</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>
<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>

    $(document).ready( function () {
      $('#myTable').DataTable();
  } );


  function Addvote(id)
{

    var ids = $('#id').val();
    var start = $('#start').val();
    var end = $('#end').val();



    var datestart = new Date(start);
    var dateend = new Date(end);
var milliseconds = datestart.getTime();
var milliseconds2 = dateend.getTime();

const date = new Date();
const localDateTime = date.toLocaleString('en-GB');

let day = localDateTime.slice(0, 10);
let time = localDateTime.slice(11, 20);
let total = formatDate(date) +''+time;

var totals = new Date(total);
var milliseconds3 = totals.getTime();

if((milliseconds3 > milliseconds) && (milliseconds2 > milliseconds3)){
    var vote_id = $('#vote_id').val(id);
    $("#vote").modal()
}else{
  $("#closevote").modal()
}

}

function edi(id)
{
    alert(id);


}



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
                            data:{
                                '_token': "{{ csrf_token() }}",
                                id:id},
                            url: '/admin/contact/' + id,
                            success: function(datas){

                                location.reload();
                            }

                        })
                    });
                } else {
                    swal("ยกเลิก", "ยกเลิกรายการ", "error");
                }
            });
        }

        $('body').on('click', '.btn-save', function() {

            var vote_id = $('#vote_id').val();
            var headid = $('#headid').val();

            $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                    dataType: 'json',
                    type:'POST',

                    data:{
                        '_token': "{{ csrf_token() }}",
                        vote_id:vote_id,headid:headid},
                    url: '/savevote',
                    success: function(datas){
                        location.reload();


                    }
                })


        });


//         function startTimer(duration, display) {
//     var timer = duration, minutes, seconds;


//     setInterval(function () {
//         minutes = parseInt(timer / 60, 10)
//         seconds = parseInt(timer % 60, 10);

//         minutes = minutes < 10 ? "0" + minutes : minutes;
//         seconds = seconds < 10 ? "0" + seconds : seconds;

//         display.textContent = minutes + ":" + seconds;

//         if (--timer < 0) {
//             timer = duration;
//         }
//     }, 1000);
// }



function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}

const date = new Date();
const localDateTime = date.toLocaleString('en-GB');


let day = localDateTime.slice(0, 10);
let time = localDateTime.slice(11, 20);
let total = formatDate(date) +''+time;



var totals = new Date(total);
var milliseconds3 = totals.getTime();
var start = $('#start').val();
var end = $('#end').val();
var datestart = new Date(start);
var dateend = new Date(end);
var milliseconds = datestart.getTime();
var milliseconds2 = dateend.getTime();
var millis = milliseconds2 - milliseconds3;

function startTimer(){
    //Thank you MaxArt.

    var fiveMinutes = 60 * 5;
    var hours = Math.floor(millis / 36e5),
        mins = Math.floor((millis % 36e5) / 6e4),
        secs = Math.floor((millis % 6e4) / 1000);
        display = document.querySelector('#time');
       display.textContent =  hours +":"+ mins + ":" + secs;


}

setInterval(function(){
    millis -= 1000;
    startTimer();
}, 1000);






function millisToMinutesAndSeconds(millisec) {
        var seconds = (millisec / 1000).toFixed(0);
        var minutes = Math.floor(seconds / 60);
        var hours = "";
        if (minutes > 59) {
            hours = Math.floor(minutes / 60);
            hours = (hours >= 10) ? hours : "0" + hours;
            minutes = minutes - (hours * 60);
            minutes = (minutes >= 10) ? minutes : "0" + minutes;
        }

        seconds = Math.floor(seconds % 60);
        seconds = (seconds >= 10) ? seconds : "0" + seconds;
        if (hours != "") {
            return hours + ":" + minutes + ":" + seconds;
        }
        return minutes + ":" + seconds;
    }


    </script>



@endsection


