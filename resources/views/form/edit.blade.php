@extends('layouts.app')

@section('title','Leave Form')
    
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Leave Application Form</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="/form/{{ $id }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-4">เลขที่ใบลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->id }}"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">ชื่อผู้ลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $users->prename.$users->f_name.' '.$users->l_name }}"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">วันที่ลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->date_leave }}"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">ประเภทการลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->leave_type }}"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">สาเหตุการลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->leave_cause }}"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">จำนวนวันลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->number_date_leave }}"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">วันที่ลา: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->date_leave }}"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">ผู้รับผิดชอบงานแทน: </div>
                    <div class="col-lg-4"><input type="text" value="{{ $forms->responsible_work }}"></div>
                </div>
                

                {{--  approve  --}}
                <div class="form-group">
                    <label for="approve">อนุมัติ</label><br>
                    <select id="approve" class="form-control" name="approve">
                        <option value="1">อนุมัติ</option>
                        <option value="0">ไม่อนุมัติ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection