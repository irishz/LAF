@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">สวัสดีคุณ {{ Auth::user()->f_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    หน้าสำหรับผู้สังเกตการณ์

                </div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">เลขที่ใบลา</th>
                    <th scope="col">รหัสพนักงาน</th>
                    <th scope="col">ชื่อผู้ลา</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">จำนวนวันลา</th>
                    <th scope="col">วันที่ลา</th>
                    <th scope="col">ผลการลา</th>
                    <th scope="col">อนุมัติโดย</th>
                    <th scope="col">วันที่อนุมัติ</th>
                    <th scope="col">แก้ไข</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($observes as $observe)
                    @if ($observe->approved == 1)
                        <tr style="background-color:lightgreen">
                    @elseif ($observe->approved === 0)
                        <tr style="background-color:#f15959">
                    @else
                        <tr style="background-color:#ff9933">
                    @endif
                        <th scope="row">{{ $observe->id }}</th>
                        <td>{{ $observe->user_id }}</td>
                        <td>{{ $observe->f_name.' '.$observe->l_name }}</td>
                        <td>{{ $observe->department }}</td>
                        <td>{{ $observe->number_date_leave }} วัน {{ $observe->hour_date_leave }} ชั่วโมง</td>
                        <td>{{ $observe->date_leave }}</td>
                    @if ($observe->approved == 1)
                        <td>อนุมัติ</td>
                    @elseif($observe->approved === 0)
                        <td>ไม่อนุมัติ</td>
                    @else
                        <td>รอการอนุมัติ</td>
                    @endif
                        <td>{{ $observe->approve_by }}</td>
                        <td>{{ $observe->approve_datetime }}</td>
                    @if ($observe->user_id == Auth::user()->user_id)
                        <td><a href="form/{{ $observe->id }}/edit" class="btn btn-info disabled">Edit</a></td>
                    @else
                        <td><a href="form/{{ $observe->id }}/edit" class="btn btn-info">Edit</a></td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection