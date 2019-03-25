@extends('layouts.app')

@section('content')
<div class="container">
@if (Auth::User()->role === 0) 
    @include('student/contribution') 
@elseif (Auth::User()->role === 1) 
    @include('cordinator/index')
@else 
    @include('manager/index')
@endif
</div>
@endsection
