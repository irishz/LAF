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

                </div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Form No.</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Name</th>
                <th scope="col">NO Leave Day</th>
                <th scope="col">Approved</th>
                <th scope="col">Approved By</th>
                <th scope="col">Leave Date</th>
                <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($observes as $observe)
                    @if ($observe->approved == 1)
                        <tr style="background-color:lightgreen">
                    @elseif ($observe->approved == NULL)
                        <tr style="background-color:#ff9933">
                    @else
                        <tr style="background-color:#f15959">
                    @endif
                        <th scope="row">{{ $observe->id }}</th>
                        <td>{{ $observe->user_id }}</td>
                        <td>{{ $observe->f_name.' '.$observe->l_name }}</td>
                        <td>{{ $observe->number_date_leave }}</td>
                        <td>{{ $observe->approved}}</td>
                        <td>{{ $observe->approve_by }}</td>
                        <td>{{ $observe->created_at }}</td>
                        <td><a href="/form/{{ $observe->id }}/edit" class="btn btn-info">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection