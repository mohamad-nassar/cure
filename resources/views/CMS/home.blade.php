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
                <h1>Home Page</h1>
            </div>
        </div>
    </div>
</section>

</div>
@endsection
