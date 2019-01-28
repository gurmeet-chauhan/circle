<form action="/status/{{ $status->id }}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger float-right">
        <i class="fas fa-trash"></i>
    </button>
</form>