@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create</button>
        </div>

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
            <input type="text" class="form-control" name="volume" placeholder="Magazine volume" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Deadline</label>
            <input type="date" class="form-control" name="deadline" placeholder="Due date" required>
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
    </div>
</div>
@endsection
