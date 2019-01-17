@foreach ($statuses as $status)
    <div class="card">
        <div class="card-header">
            <p>
                {{ $status->body }}
            </p>
            
            @include('partials.likes')

        </div>
    </div>
@endforeach