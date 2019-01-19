@if (count($errors))
    <div class="container alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
    </div>
@endif

@if (session('statusCreated'))
    <div class="container alert alert-success">
        <p>{{ session('statusCreated') }}</p>
    </div>
@endif

@if (session('statusDeleted'))
    <div class="container alert alert-info">
        <p>{{ session('statusDeleted') }}</p>
    </div>
@endif