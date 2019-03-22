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
            <form method="POST" action="/form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="date_leave">1. วันที่ขอลาหยุด</label>
                    <input type="date" class="form-control" id="date_leave" name="date_leave">
                </div>
                <div class="form-group">
                    <label for="leave_type">2. ประเภทการลา</label><br>
                    <input type="radio" name="leave_type" value="ลาป่วย">
                    <label>ลาป่วย</label><br>
                    <input type="radio" name="leave_type" value="ลากิจ">
                    <label>ลากิจ</label><br>
                    <input type="radio" name="leave_type" value="ลาพักร้อน">
                    <label>ลาพักร้อน</label><br>
                    <input type="radio" name="leave_type" value="ลาคลอด">
                    <label>ลาคลอด</label><br>
                    <input type="radio" name="leave_type" value="ลาบวช">
                    <label>ลาบวช</label><br>
                    <input type="radio" name="leave_type" value="อื่นๆ">
                    <label>อิ่นๆ</label>
                </div>
                <div class="form-group">
                    <label for="number_date_leave">3. จำนวนวันที่ลาหยุด</label>
                    <input class="form-control" type="number" id="number_date_leave" name="number_date_leave">
                </div>
                <div class="form-group">
                    <label for="leave_cause">4. สาเหตุการลา</label>
                    <textarea class="form-control" id="leave_cause" name="leave_cause"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection