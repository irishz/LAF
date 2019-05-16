@extends('layouts.app')

@section('title','Leave Form')
    
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> 
<script type="text/javascript" src="js/form.js"></script>

@endsection

@section('content')
@if(Session::has('errors'))
    <div class="alert alert-danger" id="alert">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @else
    <div class="alert alert-success" id="alert">
        บันทึกใบลาสำเร็จ ระบบกำลังนำท่านไปยังหน้าหลัก...
    </div>
@endif
<div class="container">

    <div class="row justify-content-center">
        <h1>แบบฟอร์มการลา</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="/form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="date_leave">1. วันที่ขอลาหยุด</label>
                    <input type="date" class="form-control {{ $errors->has('date_leave') ? ' is-invalid' : '' }}" id="date_leave" name="date_leave" value="{{ old('date_leave') }}">

                    @if ($errors->has('date_leave'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date_leave') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="leave_type">2. ประเภทการลา</label><br>
                    <input type="radio" name="leave_type" value="ลาป่วย" required>
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
                    <div class="row">
                        <div class="col">
                            <label for="number_date_leave">3. จำนวนวันที่ลาหยุด</label>
                            <input class="form-control" type="number" value="0" min="0" id="number_date_leave" name="number_date_leave" >
                            <label>กรณีลาครึ่งวันให้กรอก "<b>4 ชั่วโมง</b>"</label>
                        </div>
                        <div class="col">
                            <label for="hour_date_leave">จำนวนชั่วโมงที่ลาหยุด</label>
                            <input class="form-control" type="number" value="0" min="0" id="hour_date_leave" name="hour_date_leave" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="leave_cause">4. สาเหตุการลา</label>
                    <textarea class="form-control {{ $errors->has('leave_cause') ? ' is-invalid' : '' }}" id="leave_cause" name="leave_cause"></textarea>

                    @if ($errors->has('leave_cause'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('leave_cause') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="responsible_work">5. ผู้รับผิดชอบงานแทน(ชื่อผู้รับผิดชอบ-รายละเอียดงานที่ฝากดูแล-เบอร์โทรผู้รับผิดชอบแทน)</label>
                    <textarea class="form-control {{ $errors->has('responsible_work') ? ' is-invalid' : '' }}" id="responsible_work" name="responsible_work" ></textarea>

                    @if ($errors->has('responsible_work'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('responsible_work') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="attachment">6. เอกสารแนบ(ใบรับรองแพทย์ / เอกสารอื่นๆ ประกอบการลา) ถ้ามี</label>
                    <input type="file" class="form-control" id="attachment" name="attachment">
                    <label for="attachment">อัพโหลดได้เฉพาะ jpg,png,pdf เท่านั้น</label>
                </div>
                <button id="btnClick" type="submit" class="btn btn-primary">ยืนยัน</button>
            </form>
        </div>
    </div>
</div>
@endsection