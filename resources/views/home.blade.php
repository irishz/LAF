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

                    You are logged in!
                    <br>
                    Welcome K.{{ Auth::user()->f_name }} id={{ Auth::user()->user_id }}

                    @foreach ($forms as $form)
                        <li>{{ $form->form_id }}</li>
                        <li>{{ $form->user_id }}</li>
                        <li>{{ $form->approved }}</li>
                        <li>{{ $form->approve_by }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
