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
                <h1>Appointment Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Appointment</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<div class="card-body filterable">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
            <th>#</th>
            <th>Department</th>
            <th>Doctor</th>
            <th>Patient Status</th>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tfoot style="display: table-header-group">
        <tr class="filters">
            <th></th>
            <th><input type="text" placeholder="Department" class="form-control"></th>
            <th><input type="text" placeholder="Doctor" class="form-control"></th>
            <th><input type="text" placeholder="Patient Status" class="form-control"></th>
            <th><input type="text" placeholder="Date" class="form-control"></th>
            <th><input type="text" placeholder="Name" class="form-control"></th>
            <th><input type="text" placeholder="Email" class="form-control"></th>
            <th><input type="text" placeholder="Phone" class="form-control"></th>
            <th><input type="text" placeholder="Message" class="form-control"></th>
            <th></th>
        </tr>
      </tfoot>
      <tbody>
        @foreach ($appointment as $item=>$value)
        <tr>
            <td align="center">{{ $item+1 }}</td>
            <td align="center">{{ $value->departments->title }}</td>
            <td align="center">{{ $value->doctors->name }}</td>
            <td align="center">{{ $value->new_old }}</td>
            <td align="center">{{ $value->date }}</td>
            <td align="center">{{ $value->name }}</td>
            <td align="center">{{ $value->email }}</td>
            <td align="center">{{ $value->phone }}</td>
            <td align="center">{{ $value->message }}</td>
            <td align="center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edt{{ $value->id }}"><i class="fas fa-edit"></i></button>
                  </div>
            </td>
        </tr>
          <div class="modal fade" id="edt{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Appointment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ Route('updateappointment',$value->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <label>Date</label>
                    <div class="form-group">
                          <div class="input-group date" id="reservationdatetime{{ $value->id }}" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" name="date" data-target="#reservationdatetime{{ $value->id }}"/>
                              <div class="input-group-append" data-target="#reservationdatetime{{ $value->id }}" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                      <script>$('#reservationdatetime{{ $value->id }}').datetimepicker({ icons: { time: 'far fa-clock' } });</script>
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    Are You Sure you want delete this item?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <a href="{{ Route('deleteservice',$value->id) }}"  class="btn btn-danger">Yes</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </tbody>
    </table>
</div>
</div>
@endsection
