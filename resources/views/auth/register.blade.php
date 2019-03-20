@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{--  Employee id  --}}
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Employee id') }}</label>
                            
                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ old('user_id') }}" required>
                        
                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--  Prename  --}}
                        <div class="form-group row">
                            <label for="prename" class="col-md-4 col-form-label text-md-right">{{ __('Prename') }}</label>
                            
                            <div class="col-md-6">
                                <select id="prename" class="form-control" name="prename">
                                    <option value=""></option>
                                    <option value="mr">Mr.</option>
                                    <option value="miss">Miss</option>
                                    <option value="mrs">Mrs.</option>
                                </select>
                            </div>
                        </div>
                        
                        {{--  First Name  --}}
                        <div class="form-group row">
                            <label for="f_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="f_name" type="text" class="form-control" name="f_name" value="{{ old('f_name') }}" autofocus>
                            </div>
                        </div>

                        {{--  Last Name  --}}
                        <div class="form-group row">
                            <label for="l_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="l_name" type="text" class="form-control" name="l_name" value="{{ old('l_name') }}" autofocus>
                            </div>
                        </div>

                        {{--  Position  --}}
                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position" value="{{ old('position') }}" autofocus>
                            </div>
                        </div>

                        {{--  Department  --}}
                        <div class="form-group row">
                            <label for="Department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
                            
                            <div class="col-md-6">
                                <select id="department" class="form-control" name="department">
                                    <option value=""></option>
                                    @foreach ($department as $dept)
                                        <option value={{$dept}}>{{$dept}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{--  Section  --}}
                        <div class="form-group row">
                            <label for="section" class="col-md-4 col-form-label text-md-right">{{ __('Section') }}</label>
                            
                            <div class="col-md-6">
                                <select id="section" class="form-control" name="section">
                                    <option value=""></option>
                                    <option value="management">ฝ่ายบริหาร</option>
                                    <option value="medical">ฝ่ายการพยาบาล</option>
                                    <option value="med_supp">ฝ่ายสนับสนุนการแพทย์</option>
                                    <option value="gen_supp">ฝ่ายสนับสนุนทั่วไป</option>
                                </select>
                            </div>
                        </div>
                        
                        {{--  E-Mail Address  --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--  Password  --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--  password confirm  --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
