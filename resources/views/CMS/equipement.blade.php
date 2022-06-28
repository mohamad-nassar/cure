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
                <h1>Equipment Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Equipment</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<form action="{{ Route('equipementuploadimage') }}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
    <input id="image" name="file[]" type="file" multiple>
    </form>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/LANG.js"></script>
<script>

                             $("#image").fileinput({
                                  initialPreview: [
                                    @foreach ($image as $key)
                                    "{{ URL::to('/') }}/{{ $key->image }}",
                                    @endforeach
                                  ],

                                  uploadExtraData:{'_token':$('input[name="_token"]').val()},
                                  initialPreviewAsData: true,
                                  initialPreviewConfig: [
                                  @foreach ($image as $key)
                              {
                                  url:"{{ Route('equipementdeleteimage',$key->id) }}"
                              },
                              @endforeach
                              ],
                              showRemove:false,
                              preferIconicPreview:false,
                              dropZoneEnabled:true,
                              overwriteInitial: false,
                              });
                              $.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  }
                                  });
                          </script>
</div>
@endsection
