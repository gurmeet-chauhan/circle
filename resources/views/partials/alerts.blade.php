<div id="alerts">
@if (count($errors))
    <div class="container alert alert-danger">
            @foreach ($errors->all() as $error)
                <span>
                    {{ $error }}
                    <i class="fas fa-times text-white float-right btn-link alert-close"></i>
                </span>                
            @endforeach
    </div>
@endif

@if (session('statusCreated'))
    <div class="container alert alert-success">
            <span>
                {{ session('statusCreated') }}
                <i class="fas fa-times text-white float-right btn-link alert-close"></i>
            </span>
    </div>
@endif

@if (session('statusDeleted'))
    <div class="container alert alert-info">
            <span>
                {{ session('statusDeleted') }}
                <i class="fas fa-times text-white float-right btn-link alert-close"></i>
            </span>
    </div>
@endif

@if (session('profilePicUpdated'))
    <div class="container alert alert-success">
            <span>
                {{ session('profilePicUpdated') }}
                <i class="fas fa-times float-right btn-link alert-close"></i>
            </span>
    </div>
@endif
</div>