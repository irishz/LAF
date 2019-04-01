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

                    หน้าสำหรับหัวหน้าแผนก/ผู้รักษาการแทน

                </div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">เลขที่ใบลา</th>
                <th scope="col">รหัสพนักงาน</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">จำนวนวันลา</th>
                <th scope="col">ผลการลา</th>
                <th scope="col">อนุมัติโดย</th>
                <th scope="col">วันที่ลา</th>
                <th scope="col">แก้ไข</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    @if ($result->approved == 1)
                        <tr style="background-color:lightgreen">
                    @elseif ($result->approved === 0)
                        <tr style="background-color:#f15959">
                    @else
                        <tr style="background-color:#ff9933">
                    @endif
                        <th scope="row">{{ $result->id }}</th>
                        <td>{{ $result->user_id }}</td>
                        <td>{{ $result->f_name.' '.$result->l_name }}</td>
                        <td>{{ $result->number_date_leave }}</td>
                        @if ($result->approved == 1)
                            <td>อนุมัติ</td>
                        @elseif($result->approved === 0)
                            <td>ไม่อนุมัติ</td>
                        @else
                            <td>รอการอนุมัติ</td>
                        @endif
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