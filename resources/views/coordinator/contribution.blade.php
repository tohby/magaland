<h1>{{$magazine->magazine_volume}}</h1>
<p>Closure date: <small>{{\Carbon\Carbon::parse($magazine->closure)->diffForHumans()}}</small></p>

<div class="my-3">
    @include('layouts/messages')
</div>

<h4>Students with contribution to this issue in your faculty</h4>
<hr>
@foreach ($students as $student)
  <div class="row mt-2">
      <div class="col-lg-12">
          <a href="{{$magazine->id}}/user/{{$student->id}}" class="card shadow">
              <div class="card-body">
                  <h5 class="card-title">
                      {{$student->name}}
                  </h5>
                  <p class="card-text">{{$student->email}}</p>
              </div>
            </a>
      </div>
  </div>
@endforeach
