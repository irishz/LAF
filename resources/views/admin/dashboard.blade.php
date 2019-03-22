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
                @foreach ($results as $result)
                    @if ($result->approved == 1)
                        <tr style="background-color:lightgreen">
                    @elseif ($result->approved == NULL)
                        <tr style="background-color:#ff9933">
                    @else
                        <tr style="background-color:#f15959">
                    @endif
                        <th scope="row">{{ $result->id }}</th>
                        <td>{{ $result->user_id }}</td>
                        <td>{{ $result->f_name.' '.$result->l_name }}</td>
                        <td>{{ $result->number_date_leave }}</td>
                        <td>{{ $result->approved}}</td>
                        <td>{{ $result->approve_by }}</td>
                        <td>{{ $result->created_at }}</td>
                        <td><a href="/form/{{ $result->id }}/edit" class="btn btn-info">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection