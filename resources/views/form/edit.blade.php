@extends('layouts.app')

@section('title','Leave Form')
    
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>ใบลา</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="admin/form/{{ $id }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-4">เลขที่ใบลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->id }}" disabled></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">ชื่อผู้ลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $users->prename.$users->f_name.' '.$users->l_name }}" disabled></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">ประเภทการลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->leave_type }}" disabled></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">สาเหตุการลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->leave_cause }}" disabled></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">จำนวนวันลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->number_date_leave }}" disabled></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">วันที่ลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->date_leave }}" disabled></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">ผู้รับผิดชอบงานแทน: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->responsible_work }}" disabled></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">ความคิดเห็นจาก CEO: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->commented }}" disabled></div>
                </div>
                
                {{--  approve  --}}
                <div class="form-group">
                    <label for="approve">อนุมัติ</label><br>
                @if($forms->commented === null)
                    <select id="approve" class="form-control" name="approve" disabled>
                        <option value="1">อนุมัติ</option>
                        <option value="0">ไม่อนุมัติ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary" disabled>ยืนยัน</button>
                @else
                    <select id="approve" class="form-control" name="approve">
                        <option value="1">อนุมัติ</option>
                        <option value="0">ไม่อนุมัติ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection