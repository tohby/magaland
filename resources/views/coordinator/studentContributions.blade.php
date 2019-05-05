@extends('layouts.app')
@section('content')
    <h4>{{$user->name}}'s contributions to {{$magazine->magazine_volume}}</h4>
    <hr>
    @if (count($contributions) > 0)
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
                                <h6 class="card-subtitle mb-2 text-muted">Submitted :
                                    {{$contribution->created_at->diffForHumans()}}</h6>
                            </div>
                        </div>
                    </div>
                </a>
        
            </div>
        </div>
    @endforeach 
    @else
        This student does not have any contribution to this issue
    @endif
@endsection