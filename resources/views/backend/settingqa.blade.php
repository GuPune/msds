@extends('layouts.jsm')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">ตั้งค่า Q&A
        </h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Check the following errors :(  {{$errors->first()}}
        </div>
        @endif
      <div class="card shadow mb-4">
        <form method="POST"  action="{{ route('qacsetting.update',$setting->id) }}" >
            {{ method_field('PUT') }}
                {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">รอบเช้า</label>
                    <label class="col-sm-1 col-form-label">เริ่ม</label>
                    <div class="col-sm-3">
                        <input type="text" format-value="yyyy-MM-ddTHH:mm" class="form-control datetime" id="startf" name="startf"  value="{{$setting->startf}}" required>
                    </div>
                    <label class="col-sm-1 col-form-label">ถึง</label>
                    <div class="col-sm-3">
                        <input type="text" format-value="yyyy-MM-ddTHH:mm" class="form-control datetime" id="endf" name="endf"  value="{{$setting->endf}}" required>

                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">รอบบ่าย</label>
                      <label class="col-sm-1 col-form-label">เริ่ม</label>
                      <div class="col-sm-3">
                        <input type="text" format-value="yyyy-MM-ddTHH:mm" class="form-control datetime" id="startl" name="startl"  value="{{$setting->startl}}" required>
                      </div>
                      <label class="col-sm-1 col-form-label">ถึง</label>
                      <div class="col-sm-3">
                        <input type="text" format-value="yyyy-MM-ddTHH:mm" class="form-control datetime" id="endl" name="endl"  value="{{$setting->endl}}" required>
                      </div>
                    </div>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">บันทึก</button>
        </div>
        </form>
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
    format: 'HH:mm:ss',
    locale: 'en',
    sideBySide: true,
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })



        </script>
@endsection


