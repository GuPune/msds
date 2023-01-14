@extends('layouts.jsm')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Q & A</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="card shadow mb-4">
        <form method="GET"  action="{{ url('/admin/setting/qac') }}" >
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
                            <th>เวลา</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($qa as $key => $rs)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center">{{$rs->message}}</td>
                            <td class="text-center">{{$rs->created_at}}</td>
                            <td class="text-center">
                                    <a class="btn btn-danger" href="/qalist/{{$rs->id}}" target="_blank">
                                        <i class="fa fa-eye"></i>
                                    </a>
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



    $('.up').on('click',function(){
                var no   = $(this).data('no');
                var name = $(this).data('name');

    });

    function myFunction(id) {

        alert(id);
    }

        </script>
@endsection


