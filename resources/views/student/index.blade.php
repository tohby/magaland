@foreach ($magazines as $magazine)
<a href="/" class="card shadow-sm mb-3">
    <div class="card-body">
    <h5 class="card-title">{{$magazine->magazine_volume}}</h5>
    <p>Submissions end {{\Carbon\Carbon::parse($magazine->closure)->diffForHumans()}}</p>
    </div>
</a>
@endforeach