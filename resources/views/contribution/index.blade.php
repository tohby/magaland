@extends('layouts.app') 
@section('content')
<div class="container">
    @if (Auth::User()->role === 0)
        @include('student/view_contribution') 
    @elseif (Auth::User()->role === 1)
        @include('coordinator/contribution')
    @else
        @include('manager/index') 
    @endif
</div>
@endsection