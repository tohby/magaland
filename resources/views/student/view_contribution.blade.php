@extends('layouts.app') 
@section('content')
<div class="container mb-2">
    <h1>{{$contribution->title}}</h1>
    <div class="my-3">
    @include('layouts/messages')
    </div>
    <hr>
    <div class="my-1">
        @if ($contribution->file_type == "pdf")
        <iframe src="/storage/contributions/{{$contribution->file}}" width="100%" height="600px"></iframe> @else
        <img src="/storage/contributions/{{$contribution->file}}" class="img-fluid" alt="{{$contribution->title}}"> @endif
    </div>
    <hr>
    @if ($contribution->magazine->final_closure > $today)
        <div class="row float-right mb-5">
            <a class="btn btn-primary mx-2" href="/contributions/{{$contribution->id}}/edit" role="button">Edit</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">
              Delete
            </button>
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete <strong>{{$contribution->title}}</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
                </div>
                <div class="modal-body text-center">
                    <h4>Are you sure you want to delete this contribution?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{action("ContributionController@destroy", "$contribution->id")}}" method="POST"> 
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection