<h1>{{$magazine->magazine_volume}}</h1>
<p>Closure date: <small>{{\Carbon\Carbon::parse($magazine->closure)->diffForHumans()}}</small></p>

<div class="my-3">
    @include('layouts/messages')
</div>
@if ($magazine->closure > $today)
    <a href="/" class="card shadow-sm mb-3" data-toggle="modal" data-target="#exampleModal">
        <div class="card-body">
            <div class="card-text">Upload your contribution to this Issue</div>
        </div>
    </a>
@else
    <strong>Submissions for this Issue is clossed.</strong>
@endif


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new Contribution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form class="#" action="{{action("ContributionController@store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="volume_id" value="{{$magazine->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Add a title for this submission" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="terms" required>
                            <label class="custom-control-label" for="customCheck1">Accept terms and conditions</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<hr>
<h4>Your Contributions to this issue</h4>
@foreach ($contributions as $contribution)
<div class="row">
    <div class="col-lg-12">
        <a href="/contributions/{{$contribution->id}}" class="card p-1 m-1">
            <div class="card-body text-dark">
                <div class="row">
                    <div class="col-lg-1">
                        @if ($contribution->file_type == "pdf")
                            <span style="font-size: 30px;">
                                <i class="far fa-file-pdf"></i>
                            </span>
                        @else 
                            <span style="font-size: 30px;">
                               <i class="fas fa-image"></i> 
                            </span>
                        @endif
                    </div>
                    <div class="col-lg-11">
                        <h5 class="card-title">{{$contribution->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Submitted : {{$contribution->created_at->diffForHumans()}}</h6>
                    </div>
                </div>
            </div>
        </a>

    </div>
</div>
@endforeach