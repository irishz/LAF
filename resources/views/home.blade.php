@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ข้อมูลประจำตัวพนักงาน</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    สวัสดีคุณ: {{ Auth::user()->f_name }} ({{ Auth::user()->user_id }})

                </div>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">เลขที่ใบลา</th>
                <th scope="col">รหัสพนักงาน</th>
                <th scope="col">จำนวนวันลา</th>
                <th scope="col">วันที่ลา</th>
                <th scope="col">ผลการลา</th>
                <th scope="col">อนุมัติโดย</th>
                <th scope="col">วันที่อนุมัติ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    @if ($form->approved == 1)
                        <tr style="background-color:lightgreen">
                    @elseif ($form->approved == 0)
                        <tr style="background-color:#f15959">
                    @else
                        <tr style="background-color:#ff9933">
                    @endif
                        <th scope="row">{{ $form->id }}</th>
                        <td>{{ $form->user_id }}</td>
                        <td>{{ $form->number_date_leave }}</td>
                        <td>{{ $form->created_at }}</td>
                        @if ($form->approved == 1)
                            <td>อนุมัติ</td>
                        @else
                            <td>ไม่อนุมัติ</td>
                        @endif
                        <td>{{ $form->approve_by }}</td>
                        <td>{{ $form->approve_datetime }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
