<a href="/" class="card shadow-sm mb-3" data-toggle="modal" data-target="#exampleModal">
    <div class="card-body">
        <div class="card-text">Create new magazine</div>
    </div>
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New volume</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form class="#" action="{{action("MagazineController@store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Volume</label>
                        <input type="text" class="form-control" name="magazine_volume" placeholder="Magazine volume" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Closure Date</label>
                        <input type="date" class="form-control" name="closure" placeholder="Closure" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Final Closure Date</label>
                            <input type="date" class="form-control" name="final_closure" placeholder="Final Closure" required>
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

@foreach ($magazines as $magazine)
<a href="/" class="card shadow-sm mb-3">
    <div class="card-body text-dark">
    <h5 class="card-title"><i class="fas fa-folder-open mr-3"></i> {{$magazine->magazine_volume}}</h5>
    <p class="card-text">Submissions end {{\Carbon\Carbon::parse($magazine->closure)->diffForHumans()}}</p>
    </div>
</a>
@endforeach
