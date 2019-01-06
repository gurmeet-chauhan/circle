@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ auth()->user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><strong>Bio: </strong>{{ auth()->user()->bio }}</p>

                    <form action="/status/create" method="POST">
                        @csrf

                        <div class="form-group">
                          <label for="body">Update status</label>
                          <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                        </div>

                        <input type="submit" value="Post" class="btn btn-primary btn-block">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
