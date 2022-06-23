@extends('layouts.master')
@section('content')
<div class="content-wrapper">
@if($errors->has('email'))
<script>setTimeout(()=>{
document.getElementById('admnreg').click();
  },1000)</script>
@endif
 @if(Auth::user()->level=='Superadmin')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrator's List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Admins</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  @if(Session::get('err'))
  <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div style="float: right">
                <button type="button" id="admnreg" class="btn btn-primary" data-toggle="modal" data-target="#adnwadm">
                Add Administrator
                </button>
            </div>
            <br><br>
          <div class="card">

  <div class="modal fade" id="adnwadm" tabindex="-1" role="dialog" aria-labelledby="Add New Administartor" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add new administrator</h5>
        </div>
        <form action="/sendadmin" method="POST" autocomplete="off">
          @csrf
          @error('email')
          <div class="alert alert-danger" align="Center">{{ $message }}</div>
          @enderror
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <box-icon type='solid' name='user'></box-icon>
              </div>
          </div>
            <input type="text" class="form-control" name="email" placeholder="Email address">
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Send Invitation</button>
        </form>
        </div>
      </div>
    </div>
  </div>
            <div class="card-body filterable">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Block/Unblock</th>
                </tr>
                </thead>
                <tfoot style="display: table-header-group">
                  <tr class="filters">
                    <th></th>
                    <th><input type="text" class="form-control" placeholder="Name"></th>
                    <th><input type="text" class="form-control" placeholder="Email"></th>
                    <th><input type="text" class="form-control" placeholder="Level"></th>
                    <th><input type="text" class="form-control" placeholder="Creation date"></th>
                    <th><input type="text" class="form-control" placeholder="Last update"></th>
                    <th></th>
                  </tr>
                  </tfoot>
                <tbody>
                  <?php $i = 0 ?>
                 @foreach($users as $key => $value)
		 <tr>
                 <?php $i++ ?>    
                 <td align="center">{{ $i }}</td>
                 <td align="center">{{ $value->name }}</td>
                 <td align="center">{{ $value->email }}</td>
                 <td align="center">{{ $value->level }}</td>
                 <td align="center">{{ date( 'd/m/Y',  strtotime($value->created_at)) }}</td>
                 <td align="center">{{ date( 'd/m/Y',  strtotime($value->updated_at)) }}</td>
                 <td align="center">

                  <button type="button" class="btn @if($value->status=='Activated') btn-danger @else btn-success @endif " data-toggle="modal" data-target="#blk{{ $value->id }}">
                    @if($value->status=='Activated')
                    <i class="fas fa-lock"></i>
                    @else
                    <i class="fas fa-lock-open"></i>
                    @endif
                  </button>
                  </td><div class="modal fade" id="blk{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> @if($value->status=='Activated') Block administartor @else Unblock administartor @endif</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          @if($value->status=='Activated')
                          Are you sure you want block this administartor?
                          @else 
                          Are you sure you want unblock this administartor?
                          @endif
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          @if($value->status=='Activated')
                          <a href="/admin/Blocked/{{ $value->id }}" class="btn btn-danger">Yes</a>
                          @else
                          <a href="/admin/Activated/{{ $value->id }}" class="btn btn-success">Yes</a>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
		</tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
</div>
@endsection