@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>Edit {{$contribution->title}}</h1>
    <div class="my-3">
    @include('layouts/messages')
    </div>
    <hr>
    <form action="{{action("ContributionController@update", "$contribution->id")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
        <input type="text" class="form-control" name="title" value="{{$contribution->title}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">File</label>
            <input type="file" class="form-control-file" name="file">
            <small id="passwordHelpBlock" class="form-text text-muted">
              Leave this field empty to retain the old value
            </small>
        </div>
        @method('PUT')
        <button type="submit" class="btn btn-primary mt-2 float-right">Submit</button>
    </form>
</div>
@endsection