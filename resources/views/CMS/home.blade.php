@extends('layouts.master')
@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('plugins/flaticon-1.css') }}"> --}}
    <link href="{{ asset('frontend/css/flaticon-1.css') }}" rel="stylesheet">
    <div class="content-wrapper">
        @if (Session::get('err'))
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
                        color: 'white'
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
                            role="tab" aria-controls="custom-tabs-one-our-vision" aria-selected="false">Who Are We</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="our-service-tab" data-toggle="pill" href="#custom-tabs-our-service"
                            role="tab" aria-controls="custom-tabs-one-our-service" aria-selected="false">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="our-outpatient-tab" data-toggle="pill" href="#custom-tabs-our-outpatient"
                            role="tab" aria-controls="custom-tabs-one-our-outpatient" aria-selected="false">Outpatient
                            Clinics</a>
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
                        <div class="modal fade" id="addnew" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    onchange="desc(event);" name="image">
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
                                            <script>
                                                $('#text').summernote();
                                            </script>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
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
                                    @foreach ($slider as $item => $value)
                                        <tr>
                                            <td align="center">{{ $item + 1 }}</td>
                                            <td align="center"><button type="button" class="btn btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#view{{ $value->id }}">View</button></td>
                                            <td align="center">{{ $value->title }}</td>
                                            <td align="center">{!! strip_tags($value->text) !!}</td>
                                            <td align="center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#vis{{ $value->id }}"><i
                                                            class="fas fa-eye"></i></button>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#edt{{ $value->id }}"><i
                                                            class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#dlt{{ $value->id }}"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="view{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img src="{{ asset($value->image) }}" width="100%"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="vis{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Slider Visibility
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($value->status == 1)
                                                            @php
                                                                $status = 0;
                                                            @endphp
                                                            Are you sure you want hide this item?
                                                        @else
                                                            @php
                                                                $status = 1;
                                                            @endphp
                                                            Are you sure you want show this item?
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="{{ Route('statusslider', [$value->id, $status]) }}"
                                                            class="btn btn-primary">Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="edt{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ Route('updateslider', $value->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <label>Top Image</label>
                                                            <br>
                                                            <img alt="" src="{{ asset($value->image) }}"
                                                                id="img{{ $value->id }}" width="50%">

                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="customFile"
                                                                    onchange="desc{{ $value->id }}(event);"
                                                                    name="image">
                                                                <script>
                                                                    var desc{{ $value->id }} = function(event) {
                                                                        var output = document.getElementById('img{{ $value->id }}');
                                                                        output.src = URL.createObjectURL(event.target.files[0]);
                                                                        output.onload = function() {
                                                                            URL.revokeObjectURL(output.src) // free memory
                                                                        }
                                                                    };
                                                                </script>
                                                                <label class="custom-file-label" for="customFile">Choose
                                                                    file...</label>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <label>Title</label>
                                                            <input type="text" name="title" id="title"
                                                                value="{{ $value->title }}" class="form-control">
                                                            <br>
                                                            <label>Text</label>
                                                            <textarea name="text" id="text{{ $value->id }}">{{ $value->text }}</textarea>
                                                            <script>
                                                                $('#text{{ $value->id }}').summernote();
                                                            </script>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="dlt{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are You Sure you want delete this item?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">No</button>
                                                        <a href="{{ Route('deleteslider', $value->id) }}"
                                                            class="btn btn-danger">Yes</a>
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
                        <form action="{{ Route('updatewho') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label>Top Image</label>
                            <br>
                            <img alt="" src="{{ asset($who->image) }}" id="imgg" width="50%">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" onchange="descc(event);"
                                    name="image">
                                <script>
                                    var descc = function(event) {
                                        var output = document.getElementById('imgg');
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
                            <label>Description</label>
                            <textarea name="description" id="descriptionn">{{ $who->description }}</textarea>
                            <script>
                                $('#descriptionn').summernote();
                            </script>
                            <br>
                            <div align="center"><button type="submit" class="btn btn-primary">Update</button></div>
                        </form>
                    </div>


                    <div class="tab-pane fade" id="custom-tabs-our-service" role="tabpanel"
                        aria-labelledby="custom-tabs-opening-tab">
                        <div align="right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addnewserv">
                                Add New
                            </button>
                        </div>
                        <div class="modal fade" id="addnewserv" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ Route('addnewhomeservice') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <label>Icon</label>
                                            <br>
                                            <select name="icon" id="icon" class="select2 form .icn">
                                                @foreach ($icons as $icon)
                                                    <option value="{{ $icon->icon }}" data-icon="{{ $icon->icon }}">
                                                        Icon</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <br>
                                            <label>Title</label>
                                            <input type="text" name="title" id="title" class="form-control">
                                            <br>
                                            <label>Text</label>
                                            <textarea name="text" id="textserv"></textarea>
                                            <script>
                                                $('#textserv').summernote();
                                            </script>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body filterable">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Icon</th>
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
                                    @foreach ($services as $item => $value)
                                        <tr>
                                            <td align="center">{{ $item + 1 }}</td>
                                            <td align="center"><span class="{{ $value->icon }}"></span></td>
                                            <td align="center">{{ $value->title }}</td>
                                            <td align="center">{!! strip_tags($value->text) !!}</td>
                                            <td align="center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#visserv{{ $value->id }}"><i
                                                            class="fas fa-eye"></i></button>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#edtserv{{ $value->id }}"><i
                                                            class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#dltserv{{ $value->id }}"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="view{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img src="{{ asset($value->image) }}" width="100%"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="visserv{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Slider Visibility
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($value->status == 1)
                                                            @php
                                                                $status = 0;
                                                            @endphp
                                                            Are you sure you want hide this item?
                                                        @else
                                                            @php
                                                                $status = 1;
                                                            @endphp
                                                            Are you sure you want show this item?
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="{{ Route('statushomeservice', [$value->id, $status]) }}"
                                                            class="btn btn-primary">Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="edtserv{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ Route('updatehomeservice', $value->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <label>Icon</label>
                                                            <select name="icon" id="icon{{ $value->id }}"
                                                                class="form form-control select2 icn">
                                                                @foreach ($icons as $icon)
                                                                    <option value="{{ $icon->icon }}"
                                                                        data-icon="{{ $icon->icon }}"
                                                                        @if ($icon->icon == $value->icon) selected @endif>
                                                                        Icon</option>
                                                                @endforeach
                                                            </select>
                                                            <script></script>
                                                            <br>
                                                            <br>
                                                            <label>Title</label>
                                                            <input type="text" name="title" id="title"
                                                                value="{{ $value->title }}" class="form-control">
                                                            <br>
                                                            <label>Text</label>
                                                            <textarea name="text" id="text{{ $value->id }}">{{ $value->text }}</textarea>
                                                            <script>
                                                                $('#text{{ $value->id }}').summernote();
                                                            </script>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="dltserv{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are You Sure you want delete this item?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">No</button>
                                                        <a href="{{ Route('deletehomeservice', $value->id) }}"
                                                            class="btn btn-danger">Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-our-outpatient" role="tabpanel"
                        aria-labelledby="custom-tabs-opening-tab">
                        <form action="{{ Route('updateoutpatient') }}" method="post">
                            @csrf
                            <label>Happy Patients</label>
                            <input type="text" name="patient" class="form-control"
                                value="{{ $outpatient->patient }}">
                            <br>
                            <label>Qualified Doctors</label>
                            <input type="text" name="doctor" class="form-control"
                                value="{{ $outpatient->doctor }}">
                            <br>
                            <label>Clinic Rooms</label>
                            <input type="text" name="room" class="form-control"
                                value="{{ $outpatient->room }}">
                            <br>
                            <div align="center"><button type="submit" class="btn btn-primary">Update</button></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function matchStart(term, text) {
            if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                return true;
            }

            return false;
        }

        function formatText(icon) {
            return $("<span class=" + $(icon.element).data('icon') + ">" + icon.text + "</span>");
        };
        $.fn.select2.amd.require(['select2/compat/matcher'], function(oldMatcher) {
            $('#icon').select2({
                templateSelection: formatText,
                templateResult: formatText
            });
            $('.icn').select2({
                templateSelection: formatText,
                templateResult: formatText
            });
        });
    </script>
@endsection
