@extends('layouts.jsm')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">เวลาลงทะเบียนเข้างานช่วงเช้า</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0" style="text-align: center;">
                    <thead>
                        <tr class="center">
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Time</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($users as $key => $user)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center">{{$user->fname}}</td>
                            <td class="text-center">{{$user->lname}}</td>
                            <td class="text-center">{{$user->dep}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <td class="text-center">{{$user->created_at}}</td>
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






@endsection


