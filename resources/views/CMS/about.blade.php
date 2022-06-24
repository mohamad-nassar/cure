@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        @if (Session::get('err'))
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
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="top-image-tab" data-toggle="pill" href="#custom-tabs-top-image-tab"
                            role="tab" aria-controls="custom-tabs-one-top-image-tab" aria-selected="true">Top Image</a>
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
                        @php
                            $topimage = json_decode($topimg);
                        @endphp
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token"
                            id="csrf_token" value="{{ csrf_token() }}">
                        <label>Top Image</label>
                        <br>
                        <img alt="" @if ($topimage->image) src="{{ asset($topimage->image) }}" @endif
                            id="img" width="50%">

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" onchange="desc(event);"
                                name="image">
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
                        <div align="center"><button type="button" id="update" class="btn btn-primary">Update</button>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#update').click(function(e) {
                                    e.preventDefault();
                                    var formData = new FormData();
                                    var image = $('#customFile')[0].files[0];
                                    formData.append('image', image);
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: "{{ Route('aboutupdate') }}",
                                        method: 'post',
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function(result) {
                                            if (result.status == 200) {
                                                var Toast = Swal.mixin({
                                                    toast: true,
                                                    position: 'top-end',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: "<h6 style='color:white'>" + result.msg +
                                                        "</h6>",
                                                    background: '#20c997',
                                                    iconColor: 'white',
                                                    color: 'white'
                                                })
                                            }
                                        }
                                    });

                                })
                            });
                        </script>

                    </div>

                    <div class="tab-pane fade" id="custom-tabs-our-vision" role="tabpanel"
                        aria-labelledby="custom-tabs-opening-tab">
                        @php
                            $vision = json_decode($ourvision);
                        @endphp
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token"
                            id="csrf_token" value="{{ csrf_token() }}">
                        <label>Image</label>
                        <br>
                        <img alt="" @if ($vision->image) src="{{ asset($vision->image) }}" @endif
                            id="img1" width="50%">

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile1" onchange="desc(event);"
                                name="image">
                            <script>
                                var desc = function(event) {
                                    var output = document.getElementById('img1');
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
                        <label>Description:</label>
                        <textarea name="description" id="visiondesc">{{ $vision->description }}</textarea>
                        <script>
                            $('#visiondesc').summernote()
                      </script>
                        <br>
                        <div align="center"><button type="button" id="updatevision" class="btn btn-primary">Update</button>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#updatevision').click(function(e) {
                                    e.preventDefault();
                                    var formData = new FormData();
                                    var image = $('#customFile1')[0].files[0];
                                    var description = $('#visiondesc').val();
                                    formData.append('image', image);
                                    formData.append('description', description);
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: "{{ Route('visionupdate') }}",
                                        method: 'post',
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function(result) {
                                            if (result.status == 200) {
                                                var Toast = Swal.mixin({
                                                    toast: true,
                                                    position: 'top-end',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: "<h6 style='color:white'>" + result.msg +
                                                        "</h6>",
                                                    background: '#20c997',
                                                    iconColor: 'white',
                                                    color: 'white'
                                                })
                                            }
                                        }
                                    });

                                })
                            });
                        </script>
                    </div>

                    <div class="tab-pane fade" id="custom-tabs-our-mission" role="tabpanel"
                        aria-labelledby="custom-tabs-opening-tab">

                        @php
                        $mission = json_decode($ourmission);
                        @endphp
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token"
                        id="csrf_token" value="{{ csrf_token() }}">
                    <label>Image</label>
                    <br>
                    <img alt="" @if ($mission->image) src="{{ asset($mission->image) }}" @endif
                        id="img2" width="50%">

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile2" onchange="desc(event);"
                            name="image">
                        <script>
                            var desc = function(event) {
                                var output = document.getElementById('img2');
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
                    <label>Description:</label>
                    <textarea name="description" id="missiondesc">{{ $mission->description }}</textarea>
                    <script>
                        $('#missiondesc').summernote()
                  </script>
                    <br>
                    <div id="op">
                        @csrf <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                        @php
                            $values=json_decode($ourmission,true);
                            $i=0;
                        @endphp
                        <input type="hidden" name="count" id="count" value="{!! count($values['values']) !!}">
                        @foreach ($values['values'] as $key=>$value)
                        @php
                        $i++;
                        @endphp
                        <label>Text:</label>
                        <input type="text" name="text{{ $i }}" id="text{{ $i }}" value="{{ $key }}" class="form-control">
                        <br>
                        @endforeach
                    </div>
                    <br>

                    <div align="center">
                        <button type="button" onclick="addnewvalue()" class="btn btn-primary">Add New</button>
                        <button type="button" id="updatemission" class="btn btn-primary">Update</button>
                        <script>
                            function addnewvalue()
                            {
                                var count=document.getElementById('count').value;
                                var i=count;
                                i++;
                                var div=document.getElementById('op');
                                var daylabel=document.createElement('label');
                                daylabel.innerHTML="Text:"
                                var dayinput=document.createElement('input');
                                dayinput.setAttribute('type','text');
                                dayinput.setAttribute('name','text'+i);
                                dayinput.setAttribute('id','text'+i);
                                dayinput.setAttribute('class','form-control');
                                var br=document.createElement('br');
                                div.append(daylabel);
                                div.append(dayinput);
                                div.append(br);
                                document.getElementById('count').value=i;
                            }
                        </script>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#updatemission').click(function(e) {
                                e.preventDefault();
                                var formData = new FormData();
                                var image = $('#customFile2')[0].files[0];
                                var description = $('#missiondesc').val();
                                var count = $('#count').val();
                                formData.append('image', image);
                                formData.append('description', description);
                                formData.append('count', count);
                                for(i=1;i<=document.getElementById('count').value;i++)
                                {
                                    formData.append('text'+i, $('#text'+i).val());
                                }
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "{{ Route('missionupdate') }}",
                                    method: 'post',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(result) {
                                        if (result.status == 200) {
                                            var Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000
                                            });
                                            Toast.fire({
                                                icon: 'success',
                                                title: "<h6 style='color:white'>" + result.msg +
                                                    "</h6>",
                                                background: '#20c997',
                                                iconColor: 'white',
                                                color: 'white'
                                            })
                                        }
                                    }
                                });

                            })
                        });
                    </script>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-values" role="tabpanel"
                        aria-labelledby="custom-tabs-opening-tab">
                        @php
                        $values = json_decode($allvalues);
                        @endphp
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token"
                        id="csrf_token" value="{{ csrf_token() }}">
                    <label>Image</label>
                    <br>
                    <img alt="" @if ($values->image) src="{{ asset($values->image) }}" @endif
                        id="img3" width="50%">

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile3" onchange="desc(event);"
                            name="image">
                        <script>
                            var desc = function(event) {
                                var output = document.getElementById('img3');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                }
                            };
                        </script>
                        <label class="custom-file-label" for="customFile3">Choose file......</label>
                    </div>
                    <br>
                    <br>
                    <label>Description:</label>
                    <textarea name="description" id="valuesdesc">{{ $values->description }}</textarea>
                    <script>
                        $('#valuesdesc').summernote()
                  </script>
                    <br>
                    <div id="op1">
                        @csrf <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                        @php
                            $value=json_decode($allvalues,true);
                            $i=0;
                        @endphp
                        <input type="hidden" name="count1" id="count1" value="{!! count($value['values']) !!}">
                        @foreach ($value['values'] as $key=>$val)
                        @php
                        $i++;
                        @endphp
                        <label>Text:</label>
                        <input type="text" name="value{{ $i }}" id="value{{ $i }}" value="{{ $key }}" class="form-control">
                        <br>
                        @endforeach
                    </div>
                    <br>

                    <div align="center">
                        <button type="button" onclick="addnewvaluevalues()" class="btn btn-primary">Add New</button>
                        <button type="button" id="updatevalues" class="btn btn-primary">Update</button>
                        <script>
                            function addnewvaluevalues()
                            {
                                var count=document.getElementById('count1').value;
                                var i=count;
                                i++;
                                var div=document.getElementById('op1');
                                var daylabel=document.createElement('label');
                                daylabel.innerHTML="Text:"
                                var dayinput=document.createElement('input');
                                dayinput.setAttribute('type','text');
                                dayinput.setAttribute('name','value'+i);
                                dayinput.setAttribute('id','value'+i);
                                dayinput.setAttribute('class','form-control');
                                var br=document.createElement('br');
                                div.append(daylabel);
                                div.append(dayinput);
                                div.append(br);
                                document.getElementById('count1').value=i;
                            }
                        </script>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#updatevalues').click(function(e) {
                                e.preventDefault();
                                var formData = new FormData();
                                var image = $('#customFile3')[0].files[0];
                                var description = $('#valuesdesc').val();
                                var count = $('#count1').val();
                                formData.append('image', image);
                                formData.append('description', description);
                                formData.append('count', count);
                                for(i=1;i<=document.getElementById('count1').value;i++)
                                {
                                    formData.append('text'+i, $('#value'+i).val());
                                }
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "{{ Route('valuesupdate') }}",
                                    method: 'post',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(result) {
                                        if (result.status == 200) {
                                            var Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000
                                            });
                                            Toast.fire({
                                                icon: 'success',
                                                title: "<h6 style='color:white'>" + result.msg +
                                                    "</h6>",
                                                background: '#20c997',
                                                iconColor: 'white',
                                                color: 'white'
                                            })
                                        }
                                    }
                                });

                            })
                        });
                    </script>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
