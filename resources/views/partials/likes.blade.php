<p>            
    @if (auth()->user()->likes->where('status_id', $status->id)->first())
        <i class="fas fa-heart text-danger"></i>    
    @else
        <a href="/like/{{ $status->id }}" class="like-button">
            <i class="fas fa-heart"></i>            
        </a>
    @endif    
    <span>{{ $status->likes }}</span>
    <span class="float-right">
        {{ $status->created_at->diffForHumans() }}
    </span>
</p>