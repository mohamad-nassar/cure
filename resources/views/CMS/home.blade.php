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
                <h1>Home Page</h1>
            </div>
        </div>
    </div>
</section>
<div class="card card-primary card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="top-image-tab" data-toggle="pill" href="#custom-tabs-top-image-tab"
                    role="tab" aria-controls="custom-tabs-one-top-image-tab" aria-selected="true">Top Slider</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="our-vision-tab" data-toggle="pill" href="#custom-tabs-our-vision"
                    role="tab" aria-controls="custom-tabs-one-our-vision" aria-selected="false">Our Vision</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="our-mission-tab" data-toggle="pill" href="#custom-tabs-our-mission"
                    role="tab" aria-controls="custom-tabs-one-our-mission" aria-selected="false">Our Mission</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="our-values" data-toggle="pill" href="#custom-tabs-values" role="tab"
                    aria-controls="custom-tabs-one-values" aria-selected="false">Values</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-top-image-tab" role="tabpanel"
                aria-labelledby="custom-tabs-info-home-tab">
                <div align="right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnew">
                        Add New
                    </button>
                </div>
                <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="{{ Route('addslider') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body">
                            <label>Top Image</label>
                            <br>
                            <img alt="" id="img" width="50%">

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
                            <label class="custom-file-label" for="customFile">Choose file...</label>
                            </div>
                            <br>
                            <br>
                            <label>Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                            <br>
                            <label>Text</label>
                            <textarea name="text" id="text"></textarea>
                            <script>$('#text').summernote();</script>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="card-body filterable">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tfoot style="display: table-header-group">
                        <tr class="filters">
                            <th></th>
                            <th></th>
                            <th><input type="text" placeholder="Title" class="form-control"></th>
                            <th><input type="text" placeholder="Text" class="form-control"></th>
                            <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($slider as $item=>$value)
                        <tr>
                            <td>{{ $item+1 }}</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view{{ $value->id }}">View</button></td>
                            <td>{{ $value->title }}</td>
                            <td>{!! strip_tags($value->text) !!}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary">Left</button>
                                    <button type="button" class="btn btn-secondary">Middle</button>
                                    <button type="button" class="btn btn-secondary">Right</button>
                                  </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="view{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                <img src="{{ asset($value->image) }}" width="100%" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </tbody>
                    </table>
            </div>
            </div>

            <div class="tab-pane fade" id="custom-tabs-our-vision" role="tabpanel"
                aria-labelledby="custom-tabs-opening-tab">

            </div>

            <div class="tab-pane fade" id="custom-tabs-our-mission" role="tabpanel"
                aria-labelledby="custom-tabs-opening-tab">

            </div>
            <div class="tab-pane fade" id="custom-tabs-values" role="tabpanel"
                aria-labelledby="custom-tabs-opening-tab">

            </div>

        </div>
    </div>
</div>
</div>
@endsection
