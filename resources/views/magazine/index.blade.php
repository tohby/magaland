@extends('layouts.app')

@section('content')
<div class="container">
@if(Auth::User()->role === 0)
  <h1>{{$magazine->magazine_volume}}</h1>
  <p>Closure date: <small>{{$magazine->closure}}</small></p>
@endif

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
                <form class="#" action="{{action("MagazineController@store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="volume_id" value="{{$magazine->id}}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Volume</label>
                        <input type="text" class="form-control" name="volume" placeholder="Magazine volume" required>
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
<!-- <form class="" action="{{action("ContributionController@store")}}" method="post">
  @csrf

</form> -->
</div>
@endsection
