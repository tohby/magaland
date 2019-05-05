@extends('layouts.app')
@section('content')
<div class="container mb-2">
    <div class="row">
        <div class="col-lg-8">
            <h1>{{$contribution->title}}</h1>
        </div>
        <div class="col-lg-4 justify-content-center">
            @if (Auth::user()->role == 1)
                @if ($contribution->published_at == null)
                <form action="{{action("PublishController@update", "$contribution->id")}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary float-right">
                        Publish <i class="fas fa-check-circle"></i>
                    </button>
                    @method('PUT')
                </form>
                @else
                    <button type="button" class="btn btn-primary float-right">
                        Published <i class="fas fa-check-circle"></i>
                    </button>
                @endif           
            @else
                @if ($contribution->published_at != null)
                <button type="button" class="btn btn-primary float-right">
                    Published <i class="fas fa-check-circle"></i>
                </button>
                @endif
            @endif
        </div>
    </div>
    
    <div class="my-3">
        @include('layouts/messages')
    </div>
    <hr>
    <div class="my-1">
        @if ($contribution->file_type == "pdf")
        <iframe src="/storage/contributions/{{$contribution->file}}" width="100%" height="600px"></iframe> @else
        <img src="/storage/contributions/{{$contribution->file}}" class="img-fluid" alt="{{$contribution->title}}">
        @endif
    </div>
    <hr>
    @if ($contribution->user_id == Auth::user()->id)
    @if ($magazine->final_closure > $today)
    <div class="row float-right mb-5">
        <a class="btn btn-primary mx-2" href="/contributions/{{$contribution->id}}/edit" role="button">Edit</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">
            Delete
        </button>
    </div>
    @endif
    @endif

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete <strong>{{$contribution->title}}</strong>
                    </h5>
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

    <div id="comment">
        <h4 class="font-weight-bold my-5">Comments</h4>
        @foreach ($contribution->comments as $comment)
        <div class="media my-2">
            <div class="media-body">
                <h5 class="mt-0">{{$comment->user->name}}</h5>
                <p>{{$comment->comment}}</p>
                
                <small class="float-right">{{$comment->created_at->diffForHumans()}}</small>
            </div>
        </div>
        @endforeach

    </div>
    <hr>
    <div id="comment-box my-3">
        @if (Auth::user()->role == 1)
        <form action="{{action("CommentController@store")}}" method="post">
            <div class="form-group">
                @csrf
                <input type="hidden" name="contribution_id" value="{{$contribution->id}}">
                <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                <label for="exampleFormControlTextarea1">Comment</label>
                <textarea class="form-control" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right mb-5">Primary</button>
        </form>
        @endif
    </div>
</div>
@endsection