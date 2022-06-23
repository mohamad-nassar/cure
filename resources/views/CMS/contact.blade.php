@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Contact Us Page</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <div class="card card-primary">
        <div class="card-header" align="center">
          <h3 class="card-title">Contact Us</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body" style="display: block">
          <div class="row">
            <div class="col">
              <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-one-info-tab" data-toggle="pill" href="#custom-tabs-info-tab" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Contact Info</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-opening-tab" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Opening Hous</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-info-tab" role="tabpanel" aria-labelledby="custom-tabs-info-home-tab">
                      <form action="{{ Route('contactpdate') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @php
                         $contactus=json_Decode($contact)
                        @endphp
                        @csrf <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                        <label>Top Image</label>
                        <br>
                        <img @if($contactus->image) src="{{ asset($contactus->image) }}" @endif alt="" id="img" width="50%">

                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" onchange="desc(event);" name="image">
                        <script>
                            var desc = function(event) {
                                    var output = document.getElementById('img');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output.src) // free memory
                                    }
                                };
                        </script>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <br>
                        <br>
                        <label>Location</label>
                        <textarea name="location" id="location">{{ $contactus->location }}</textarea>
                        <script>
                              $('#location').summernote()
                        </script>
                        <br>
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $contactus->email }}">
                        <br>
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $contactus->phone }}">
                        <br>
                        <div align="center"><button type="button" class="btn btn-primary" id="updbtn">Update</button></div>
                        <script>
                          $(document).ready(function(){
                            $('#updbtn').click(function(e){
                              e.preventDefault();
                              var email=$('#email').val();
                              var phone=$('#phone').val();
                              var location=$('#location').val();
                              var image=$('#customFile')[0].files[0];
                              var formData=new FormData();
                              formData.append('email',email);
                              formData.append('phone',phone);
                              formData.append('location',location);
                              formData.append('image',image);
                                $.ajaxSetup({
                                headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  }
                                });
                                $.ajax({
                                   url: "{{ Route('contactpdate') }}",
                                   method: 'post',
                                   data: formData,
                                   processData: false,
                                   contentType: false,
                                   success: function(result){
                                     if(result.status ==200 )
                                     {
                                        var Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                        });
                                        Toast.fire({
                                        icon: 'success',
                                        title: "<h6 style='color:white'>"+result.msg+"</h6>",
                                        background: '#20c997',
                                        iconColor: 'white',
                                        color:'white'
                                    })
                                     }
                                   }});
                                });
                             });
                       </script>
                      </form>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-opening-tab" role="tabpanel" aria-labelledby="custom-tabs-opening-tab">
                        <div id="op">
                            @csrf <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                            @php
                                $open=json_decode($opening,true);
                                $i=0;
                            @endphp
                            <input type="hidden" name="count" id="count" value="{!! count($open) !!}">
                            @foreach ($open as $key=>$value)
                            @php
                                $i++;
                            @endphp
                            <label>Days:</label>
                            <input type="text" name="day{{ count($open)+1 }}" id="day{{ $i }}" value="{{ $key }}" class="form-control">
                            <label>Hours:</label>
                            <input type="text" name="hour{{ count($open)+1 }}" id="hour{{ $i }}" value="{{ $value }}" class="form-control">
                            <br>
                            @endforeach
                        </div>
                        <div align="center">
                        <button class="btn btn-primary" onclick="addnew()">Add New</button>
                        <button class="btn btn-primary" type="button" id="update">Update</button>
                        <script>
                            $(document).ready(function(){
                            $('#update').click(function(e){
                              e.preventDefault();
                              var formData=new FormData();
                              formData.append('count',$('#count').val());
                              for(i=1;i<=document.getElementById('count').value;i++)
                              {
                                formData.append('day'+i,$('#day'+i).val())
                                formData.append('hour'+i,$('#hour'+i).val())
                              }
                                $.ajaxSetup({
                                headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  }
                                });
                                $.ajax({
                                   url: "{{ Route('openingupdate') }}",
                                   method: 'post',
                                   data: formData,
                                   processData: false,
                                   contentType: false,
                                   success: function(result){
                                    console.log(result.msg);
                                     if(result.status ==200 )
                                     {
                                        var Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                        });
                                        Toast.fire({
                                        icon: 'success',
                                        title: "<h6 style='color:white'>"+result.msg+"</h6>",
                                        background: '#20c997',
                                        iconColor: 'white',
                                        color:'white'
                                    })
                                     }
                                   }});
                                });
                             });
                        </script>
                        </div>
                        <script>
                            function addnew()
                            {
                                var count=document.getElementById('count').value;
                                var i=count;
                                i++;
                                var div=document.getElementById('op');
                                var daylabel=document.createElement('label');
                                daylabel.innerHTML="Days:"
                                var dayinput=document.createElement('input');
                                dayinput.setAttribute('type','text');
                                dayinput.setAttribute('name','day'+i);
                                dayinput.setAttribute('id','day'+i);
                                dayinput.setAttribute('class','form-control');
                                var hourlabel=document.createElement('label');
                                hourlabel.innerHTML="Hours:"
                                var hourinput=document.createElement('input');
                                hourinput.setAttribute('type','text');
                                hourinput.setAttribute('name','day'+i);
                                hourinput.setAttribute('id','hour'+i);
                                hourinput.setAttribute('class','form-control');
                                var br=document.createElement('br');
                                div.append(daylabel);
                                div.append(dayinput);
                                div.append(hourlabel);
                                div.append(hourinput);
                                div.append(br);
                                document.getElementById('count').value=i;
                            }
                        </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


            </div>
      </div>
</div>
@endsection
