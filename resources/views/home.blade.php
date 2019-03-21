@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employee Data</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    Welcome K.{{ Auth::user()->f_name }} id={{ Auth::user()->user_id }}
                </div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Approved</th>
                <th scope="col">Approved By</th>
                <th scope="col">Leave Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    @if ($form->approved == 1)
                        <tr style="background-color:lightgreen">
                    @else
                        <tr style="background-color:#f15959">
                    @endif
                        <th scope="row">1</th>
                        <td>{{ $form->user_id }}</td>
                        <td>{{ $form->approved}}</td>
                        <td>{{ $form->approve_by }}</td>
                        <td>{{ $form->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
