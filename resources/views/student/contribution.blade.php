<h1>{{$magazine->magazine_volume}}</h1>
<p>Closure date: <small>{{$magazine->closure}}</small></p>

<a href="/" class="card shadow-sm mb-3" data-toggle="modal" data-target="#exampleModal">
    <div class="card-body">
        <div class="card-text">Upload your contribution to this Issue</div>
    </div>
</a>

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
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="terms" required>
                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
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
<h4>Your Contributions</h4>
