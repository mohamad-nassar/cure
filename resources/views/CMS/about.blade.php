@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    @if(Session::get('err'))
	<script>
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
	Toast.fire({
        icon: 'success',
        title: '{{ Session::get('err') }}',
        background: '#20c997',
      })
	</script>
  @endif
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>About Us Page</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <div class="card card-primary">
        <div class="card-header" align="center">
          <h3 class="card-title">About Us</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body" style="display: block">
          <form action="{{ Route('aboutupdate') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @php
             $aboutus=json_Decode($about)   
            @endphp
            @csrf
            <label>Top Image</label>
            <br>
            <img src="{{ asset($aboutus->image) }}" alt="" id="img" width="50%">

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
            <label>Caption</label>
            <textarea name="caption" id="caption">{{ $aboutus->caption }}</textarea>
            <script>
                  $('#caption').summernote()
            </script>
            <br>
            <label>Description</label>
            <textarea name="description" id="description">{{ $aboutus->description }}</textarea>
            <script>
                  $('#description').summernote()
            </script>
            <div align="center"><button type="submit" class="btn btn-primary">Update</button></div>
          </form>
            </div>
      </div>
</div>
@endsection