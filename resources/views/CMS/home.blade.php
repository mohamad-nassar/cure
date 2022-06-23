@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/change/video" method="post" enctype="multipart/form-data">
    @csrf
<label>Top video</label>
<input type="file" name="video" class="form-control">
<button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection