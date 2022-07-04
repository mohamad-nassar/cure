@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    @if(Session::get('err'))
	<script>
    $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

      Toast.fire({
        icon: 'success',
        title: "<h6 style='color:white'>{{ Session::get('err') }}</h6>",
        background: '#20c997',
        iconColor: 'white',
        color:'white'
      })
    });
          </script>
          @endif
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Consultant Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Consultant</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<form action="{{ Route('cmsconsultantupdate') }}" method="post" style="margin: 10px">
    @csrf
    <label>For Doctors</label>
    <textarea name="doctor" id="doctor">{{ $consult->doctor }}</textarea>
    <script>$('#doctor').summernote();</script>
    <br>
    <br>
    <label>If You Are a Consultant</label>
    <textarea name="consult" id="consult">{{ $consult->consultant }}</textarea>
    <script>$('#consult').summernote();</script>
    <div align="center"><button class="btn btn-primary" type="submit">Update</button></div>
</form>
@endsection
