<p>            
    @if (auth()->user()->likes->where('status_id', $status->id)->first())
        <i class="fas fa-heart text-danger"></i>    
    @else
        <a href="/like/{{ $status->id }}" class="like-button">
            <i class="fas fa-heart"></i>            
        </a>
    @endif    
    <span>{{ $status->likes }}</span>
    <a href="/status/{{ $status->id }}" class="ml-4">
        <i class="fas fa-comment"></i> {{ $status->comments()->count() }}
        {{-- {{ $status->comments()->count() <= 1 ? 'comment' : 'comments' }} --}}
    </a>
    <span class="float-right text-muted">
        posted {{ $status->created_at->diffForHumans() }}
    </span>
</p>