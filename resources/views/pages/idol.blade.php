@extends('layouts.apps3', ['page' => 'idol'])

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
    /* background-color: #21A7E1; */
    background-color: #1e2c32;
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
    /* background-color: #21A7E1; */
    background-color: #1e2c32;
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
    /* background-color: #21A7E1; */
    background-color: #1e2c32;
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
    /* background-color: #21A7E1; */
    background-color: #1e2c32;
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
    /* background-color: #21A7E1; */
    background-color: #1e2c32;
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
    /* background-color: #21A7E1; */
    background-color: #1e2c32;
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
            <input type="hidden" id="uservote" name="uservote" value="{{$datavotesolo['user_id']}}">

            {{-- <input type="text" id="start" name="start" value="{{date('d/m/Y H:i:s', strtotime($headvote->start))}}">
            <input type="text" id="end" name="end" value="{{date('d/m/Y H:i:s', strtotime($headvote->end))}}"> --}}

            <input type="hidden" id="start" name="start" value="{{$headvote->start}}">
            <input type="hidden" id="end" name="end" value="{{$headvote->end}}">
            <p style="text-align: center;color: white;">{{$headvote->title}}</p>
          </div>
        </div>

        <div class="col-2 col-md-4" style="padding-top: 5px;padding-bottom: 5px">

            </div>
        </div>


        <div style="text-align: right;color: white;">Vote closes in <span id="time">00:00:00</span></div>

<div class="row">

    @foreach($abc as $key => $xx)


    <div class="col-4 col-md-4" style="padding-top: 5px;padding-bottom: 5px" onclick="Addvote({{$xx['id']}},{{$xx['name']}});">
        {{-- <div class="card {{ $xx['id'] ==  $datavotesolo['votes_id'] ? 'selvote' : '' }}">
            <img class="card-img-top imgs" src="/public/product/{{$xx['image']}}" alt="Card image cap">
        </div> --}}

        <div class="card blocl {{ $xx['id'] ==  $datavotesolo['votes_id'] ? 'selvote' : '' }}">
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

  </div>



  <div class="row">
    <div class="col-2 col-md-4" style="padding-top: 5px;padding-bottom: 5px">

        </div>
        <div class="col-8 col-md-4" style="padding-top: 5px;padding-bottom: 5px">
            <div class="card-body">
                <input type="hidden" id="headgroupid" name="headgroupid" value="{{$headvotegroup->id}}">
                <input type="hidden" id="id" name="id" value="{{Auth::guard('web')->user()->id}}">

                {{-- <input type="text" id="uservote" name="uservote" value="{{$uservote->votes_id}}"> --}}
                <input type="hidden" id="usergroupvote" name="usergroupvote" value="{{$datavotegroup['user_id']}}">

                {{-- <input type="text" id="startgroup" name="startgroup" value="{{date('d/m/Y H:i:s', strtotime($headvotegroup->start))}}">
                <input type="text" id="endgroup" name="endgroup" value="{{date('d/m/Y H:i:s', strtotime($headvotegroup->end))}}"> --}}
                <input type="hidden" id="startgroup" name="startgroup" value="{{$headvotegroup->start}}">
                <input type="hidden" id="endgroup" name="endgroup" value="{{$headvotegroup->end}}">
                <p style="text-align: center;color:white">{{$headvotegroup->title}}</p>
              </div>
            </div>

            <div class="col-2 col-md-4" style="padding-top: 5px;padding-bottom: 5px">

                </div>
            </div>


            <div style="text-align: right;color: white;">Vote closes in <span id="timegroup">00:00:00</span></div>



  <div class="row">
    @foreach($group as $key => $groups)
    <div class="col-4 col-md-4" style="padding-top: 5px;padding-bottom: 5px" onclick="Addvotegroup({{$groups['id']}},{{$groups['name']}});">
        {{-- <div class="card {{ $groups['id'] ==  $datavotegroup['votes_id'] ? 'selvote' : '' }}">
            <img class="card-img-top imgs" src="/public/product/{{$groups['image']}}" alt="Card image cap">
        </div> --}}


        <div class="card blocl {{ $groups['id'] ==  $datavotegroup['votes_id'] ? 'selvote' : '' }}">
            <div class="card-body">
             {{$groups['name']}}
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

  </div>



  <div class="modal fade" id="vote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <input type="hidden" id="vote_id" name="vote_id">
            <div class="modal-header" style="justify-content: center;">
                <img id="myImg" src="/aaaa.jpg" alt="Snow" style="width:50%;">
            </div>
            <div class="modal-body">????????? {{Auth::guard('web')->user()->fname}} ???????????????????????????????????????????????????????????????????????? <span id="namemodal"></span>?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-save" href="#">Vote</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="votegroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <input type="hidden" id="votegroup_id" name="votegroup_id">
            <div class="modal-header" style="justify-content: center;">
                <img id="myImg" src="/aaaa.jpg" alt="Snow" style="width:50%;">
            </div>
            <div class="modal-body">????????? {{Auth::guard('web')->user()->fname}} ???????????????????????????????????????????????????????????????????????? <span id="namemodalgroup"></span>?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-save-group" href="#">Votegroup</a>
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
            <div class="modal-body">??????????????????????????????????????????????????????????????????????????????????????????</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>
<br>

<script>

    $(document).ready( function () {
      $('#myTable').DataTable();
  } );


  function Addvote(id,name)
{

    var ids = $('#id').val();
    var start = $('#start').val();



    const date = new Date().getTime();
    var datestart = new Date(start.replace(/\s+/g, 'T').concat('.000+07:00')).getTime();
    var dateend = new Date(end.replace(/\s+/g, 'T').concat('.000+07:00')).getTime();



//     var datestart = new Date(start);
//     var dateend = new Date(end);
// var milliseconds = datestart.getTime();
// var milliseconds2 = dateend.getTime();

// const date = new Date();
// const localDateTime = date.toLocaleString('en-GB');

// let day = localDateTime.slice(0, 10);
// let time = localDateTime.slice(11, 20);
// let total = formatDate(date) +''+time;

// var totals = new Date(total);
// var milliseconds3 = totals.getTime();


if((date > datestart) && (dateend > date)){
    var vote_id = $('#vote_id').val(id);
    document.getElementById("namemodal").innerHTML = name;
    $("#vote").modal()
}else{
  $("#closevote").modal()
}




}

function Addvotegroup(id,name)
{

    var ids = $('#id').val();
    var startp = $('#startgroup').val();
    var end = $('#endgroup').val();

    console.log(name);
    const date = new Date().getTime();
    var datestart = new Date(start.replace(/\s+/g, 'T').concat('.000+07:00')).getTime();
    var dateend = new Date(end.replace(/\s+/g, 'T').concat('.000+07:00')).getTime();


//     var datestart = new Date(startgroup);
//     console.log(datestart);
//     var dateend = new Date(endgroup);
// var milliseconds = datestart.getTime();
// var milliseconds2 = dateend.getTime();

// const date = new Date();
// const localDateTime = date.toLocaleString('en-GB');

// let day = localDateTime.slice(0, 10);
// let time = localDateTime.slice(11, 20);
// let total = formatDate(date) +''+time;

// var totals = new Date(total);
// var milliseconds3 = totals.getTime();


if((date > datestart) && (dateend > date)){
    var vote_id = $('#votegroup_id').val(id);
    document.getElementById("namemodalgroup").innerHTML = name;
    $("#votegroup").modal()
}else{
  $("#closevote").modal()
}


}

function edi(id)
{
    alert(id);


}

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



function deleteConf(id) {
            swal({
                title: "??????????????????????????????????????????????????????????????????????",
                text: "????????????????????????????????????????????????????????????????????????!",
                icon: "warning",
                buttons: [
                    '??????????????????????????????????????????',
                    '????????????????????????'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: '????????????????????????!',
                        text: '???????????????????????????????????????????????????',
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
                    swal("??????????????????", "????????????????????????????????????", "error");
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



        $('body').on('click', '.btn-save-group', function() {

var vote_id = $('#votegroup_id').val();
var headid = $('#headgroupid').val();

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



 const date = new Date().getTime();

// const localDateTime = date.toLocaleString('en-GB');

// let day = localDateTime.slice(0, 10);
// let time = localDateTime.slice(11, 20);
// let total = formatDate(date) +''+time;

// var totals = new Date(total);
// var milliseconds3 = totals.getTime();



    var start = $('#start').val();
    var end = $('#end').val();
    var startgroup = $('#startgroup').val();
    var endgroup = $('#endgroup').val();

    // var datestart = new Date(Date.parse(start));
    var datestart = new Date(start.replace(/\s+/g, 'T').concat('.000+07:00')).getTime();
    var dateend = new Date(end.replace(/\s+/g, 'T').concat('.000+07:00')).getTime();


    var datestartgroup = new Date(start.replace(/\s+/g, 'T').concat('.000+07:00')).getTime();
    var dateendgroup = new Date(endgroup.replace(/\s+/g, 'T').concat('.000+07:00')).getTime();


//     var dateend = new Date(end);
//     var datestartgroup = new Date(startgroup);
//     var dateendgroup = new Date(endgroup);
// var milliseconds = datestart.getTime();
// var milliseconds2 = dateend.getTime();
// var millisecondsgroup = datestartgroup.getTime();
// var millisecondsgroupend = dateendgroup.getTime();

 var millis = dateend - date;
 var millisgroup = dateendgroup - date;
// var millisgroup = millisecondsgroupend - milliseconds3;
// var millis = 123456789;
function startTimer(){
    //Thank you MaxArt.

    var fiveMinutes = 60 * 5;
    var hours = Math.floor(millis / 36e5),
        mins = Math.floor((millis % 36e5) / 6e4),
        secs = Math.floor((millis % 6e4) / 1000);

    var hoursgroup = Math.floor(millisgroup / 36e5),
        minsgroup = Math.floor((millisgroup % 36e5) / 6e4),
        secsgroup = Math.floor((millisgroup % 6e4) / 1000);
        display = document.querySelector('#time');
        displaygroup = document.querySelector('#timegroup');
      display.textContent =  hours +":"+ mins + ":" + secs;
     displaygroup.textContent =  hoursgroup +":"+ minsgroup + ":" + secsgroup;

}

setInterval(function(){
    millis -= 1000;
     millisgroup -= 1000;
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


