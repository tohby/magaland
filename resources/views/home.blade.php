@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="card text-white shadow">
        <img src="/svg/english.jpg" class="card-img img-header" alt="...">
        <div class="card-img-overlay">
            <h1 class="card-title font-weight-bold">
                @if (Auth::User()->role === 0) Student @elseif (Auth::User()->role === 1) Marketing Coordinator @else Marketing Manager @endif
            </h1>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>
    <div class="mt-3">
        @include('layouts/messages')
    </div>
    <div class="row py-4">
        <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Upcoming</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link float-right">View all</a>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            @if (Auth::User()->role === 0) 
                @include('student/index') 
            @elseif (Auth::User()->role === 1) 
                @include('cordinator/index')
            @else 
                @include('manager/index')
            @endif
        </div>
    </div>
</div>
@endsection