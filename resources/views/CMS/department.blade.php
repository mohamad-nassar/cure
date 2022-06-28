@extends('layouts.master')
@section('content')
<link href="{{ asset('frontend/css/flaticon-1.css') }}" rel="stylesheet">
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
                <h1>Department Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Department</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<div align="right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnew">
        Add New
      </button>
    </div>
      <!-- Modal -->
      <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ Route('addnewdepartment') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">

                <label>Title</label>
                <input type="text" name="title" id="title" class="form-control">
                <br>
                <label>Caption</label>
                <textarea name="caption" id="caption"></textarea>
                <script>
                    $('#caption').summernote();
                </script>
                <br>
                <label>Icon</label>
                <select class="form select2 form-control" name="icon" id="icon">
                    @foreach ($icons as $icon)
                    <option value="{{ $icon->icon }}" data-icon="{{ $icon->icon }}">Icon</option>
                    @endforeach
                </select>
                <br>
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
            @foreach ($departments as $item=>$value)
            <tr>
                <td align="center">{{ $item+1 }}</td>
                <td align="center"><span class="{{ $value->icon }} blue-icon"></span></td>
                <td align="center">{{ $value->title }}</td>
                <td align="center">{!! strip_tags($value->text) !!}</td>
                <td align="center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vis{{ $value->id }}"><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edt{{ $value->id }}"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dlt{{ $value->id }}"><i class="fas fa-trash"></i></button>
                      </div>
                </td>
            </tr>
              <div class="modal fade" id="vis{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Department Visibility</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    @if($value->status==1)
                    @php
                        $status=0;
                    @endphp
                        Are you sure you want hide this item?
                    @else
                    @php
                        $status=1;
                    @endphp
                        Are you sure you want show this item?
                    @endif
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a href="{{ Route('statusdepartment',[$value->id,$status]) }}"  class="btn btn-primary">Save</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="edt{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ Route('updatedepartment',$value->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-body">
                        <label>Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $value->title }}">
                <br>
                <label>Caption</label>
                <textarea name="caption" id="caption{{ $value->id }}">{{ $value->text }}</textarea>
                <script>
                    $('#caption{{ $value->id }}').summernote();
                </script>
                <br>
                <label>Icon</label>
                <select name="icon" id="icon{{ $value->id }}" class="form form-control select2 icn">
                    @foreach ($icons as $icon)
                    <option value="{{ $icon->icon }}" data-icon="{{ $icon->icon }}" @if($icon->icon==$value->icon) selected @endif>Icon</option>
                    @endforeach
                </select>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit"  class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="dlt{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Department</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        Are You Sure you want delete this item?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <a href="{{ Route('deletedepartment',$value->id) }}"  class="btn btn-danger">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
<script>
    function matchStart (term, text) {
  if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
    return true;
  }

  return false;
}
              function formatText(icon){
                return $('<span><i class="fas ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
              };
              $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                $('#icon').select2({
                templateSelection: formatText,
                templateResult: formatText
                  });
              });
</script>
@endsection
