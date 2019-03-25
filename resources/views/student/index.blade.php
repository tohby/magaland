@foreach ($magazines as $magazine)
<a href="/" class="card shadow-sm mb-3">
    <div class="card-body">
    <div class="card-title">{{$magazine->magazine_volume}}</div>
    </div>
</a>
@endforeach