@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! as admin

                        <h3>user id: </h3>
                        @foreach ($results as $result)
                            <label>{{ $result->user_id }}</label>
                        @endforeach
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection