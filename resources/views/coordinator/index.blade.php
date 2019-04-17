@foreach ($magazines as $magazine)
<a href="/magazines/{{$magazine->id}}" class="card shadow-sm mb-3">
    <div class="card-body text-dark">
    <h5 class="card-title"><i class="fas fa-folder-open mr-3"></i> {{$magazine->magazine_volume}}</h5>
    <p class="card-text">Submissions end {{\Carbon\Carbon::parse($magazine->closure)->diffForHumans()}}</p>
    </div>
</a>
@endforeach