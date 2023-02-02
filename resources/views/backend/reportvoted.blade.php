@extends('layouts.jsm')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">รายงานผลการโหวตคะแนน</h1>


    <div class="card shadow mb-4">
        <div class="card-body">

            <form method="GET"  id='myform' >
            <div class="form-row">
                <div class="form-group col-md-6">
                    <select class="custom-select" onchange='submitForm();' name="type" id="type">
                      <option value="1" @if($type == 1)  selected @endif>Talent Show</option>
                      <option value="2" @if($type == 2)  selected @endif>NEXT IDOL INDIVIDUAL</option>
                      <option value="3" @if($type == 3)  selected @endif>NEXT IDOL GROUP</option>
                    </select>
                  </div>

                  <div>
                    @php

                        if($type == ''){
                            $type = 1;

                        }
                    @endphp
                    <span style="float: right"><a  href="exportvote/{{$type}}"  class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i> ดาวน์โหลดข้อมูลไฟล์ Excel</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
              </div>
            </form>
        </div>
    </div>

    <canvas id="myChart" height="100px"></canvas>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="text-align: center;">
                    <thead>
                        <tr class="center">
                            <th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>รูปภาพ</th>
                            <th>คำอธิบาย</th>
                            <th>จำนวนผลการโหวต</th>
                            <th>คะแนนเปอร์เซ็น</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($s as $key => $rs)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center">{{$rs['name']}}</td>
                            <td class="text-center">
                                <img class="img-profile"
                                src="/public/product/{{$rs['image']}}" width="150" height="100">
                            </td>
                            <td class="text-center">{{$rs['des']}}</td>
                            <td class="text-center">{{$rs['total']}}</td>

                            <td class="text-center">{{ number_format($rs['vote'], 2) }}%</td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>










</div>
<style type="text/css">
    body{
        font-family: 'Roboto Mono', monospace;
    }
    h1{
        text-align: center;
        font-size:35px;
        font-weight:900;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>


function submitForm(){
  // Call submit() method on <form id='myform'>
    document.getElementById('myform').submit();
}
        </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">

    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};
    var name =  {{ Js::from($name) }};

    const data = {
        labels: labels,

        datasets: [{
            label: name,
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users,
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

</script>
@endsection


