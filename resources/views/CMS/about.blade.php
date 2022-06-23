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
      {{-- <div class="card card-primary">
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
      </div> --}}

      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="top-image-tab" data-toggle="pill" href="#custom-tabs-top-image-tab" role="tab" aria-controls="custom-tabs-one-top-image-tab" aria-selected="true">Top Image</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="our-vision-tab" data-toggle="pill" href="#custom-tabs-our-vision" role="tab" aria-controls="custom-tabs-one-our-vision" aria-selected="false">Our Vision</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="our-mission-tab" data-toggle="pill" href="#custom-tabs-our-mission" role="tab" aria-controls="custom-tabs-one-our-mission" aria-selected="false">Our Mission</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="our-values" data-toggle="pill" href="#custom-tabs-values" role="tab" aria-controls="custom-tabs-one-values" aria-selected="false">Values</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-top-image-tab" role="tabpanel" aria-labelledby="custom-tabs-info-home-tab">

            </div>

            <div class="tab-pane fade" id="custom-tabs-our-vision" role="tabpanel" aria-labelledby="custom-tabs-opening-tab">

            </div>

            <div class="tab-pane fade" id="custom-tabs-our-mission" role="tabpanel" aria-labelledby="custom-tabs-opening-tab">

            </div>
            <div class="tab-pane fade" id="custom-tabs-values" role="tabpanel" aria-labelledby="custom-tabs-opening-tab">

            </div>

          </div>
        </div>
      </div>
</div>
@endsection
