<p>            
    @if (auth()->user()->likes->where('status_id', $status->id)->first())
        <i class="fas fa-heart text-danger"></i>    
    @else
        <a href="/like/{{ $status->id }}">
            <i class="fas fa-heart"></i>
        </a>
    @endif
        {{ $status->likes }} 
    <span class="float-right">
        {{ $status->created_at->diffForHumans() }}
    </span>
</p>