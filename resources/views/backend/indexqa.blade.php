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
        <div class="card-header py-3"  style="text-align:right; margin: 0 0 2% 0;">
            <a href="/admin/carosel/create" class="btn btn-success">
                เพิ่มภาพสไลด์
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="text-align: center;">
                    <thead>
                        <tr class="center">
                            <th>ลำดับ</th>
                            <th>คำถาม</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($qa as $key => $rs)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center">{{$rs->message}}</td>
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


