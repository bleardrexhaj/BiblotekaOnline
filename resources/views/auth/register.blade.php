@extends('layouts.app')

@section('content')


<div class="row justify-content-md-center align-items-center" style="min-height:90vh!important">
    <div class="col-md-10">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Regjistrohu</h4>

                <form id="register_form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-5">
                                    <label for="pid" class="small control-label">ID:

                                            <strong class="text-danger" id="pid_message">
                                                @if ($errors->has('pid')) {{ $errors->first('pid') }} @endif
                                            </strong>

                                    </label>

                                    
                                        <input id="pid" placeholder="Personal/Student ID" type="text" class="form-control {{ $errors->has('pid') ? ' is-invalid' : '' }}" name="pid" value="{{ old('pid') }}" required autofocus>


                                
                                </div>
                                <div class="col-3">
                                    <label for="name" class="small control-label">Emri:

                                        <strong class="text-danger" id="name_message">
                                            @if ($errors->has('name')) {{ $errors->first('name') }} @endif
                                        </strong>

                                    </label>

                                    
                                        <input id="name" placeholder="Emri" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                
                                </div>
                                <div class="col-4">
                                    <label for="surname" class="small control-label">Mbiemri:
                                        <strong class="text-danger" id="surname_message">
                                            @if ($errors->has('surname')) {{ $errors->first('surname') }} @endif
                                        </strong>

                                    </label>


                                    <input id="surname" placeholder="Mbiemri" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required>


                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-7">
                                    <label for="address" class="small control-label">Addresa:
                                        <strong class="text-danger" id="address_message">
                                            @if ($errors->has('address')) {{ $errors->first('address') }} @endif
                                        </strong>
                                    </label>
                                    
                                        <input id="address" placeholder="Fshati/Qyteti, Komuna" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required >

                                </div>

                                <div class="col-5">
                                    <label for="dob" class="small control-label">Datelindja:
                                        <strong class="text-danger" id="dob_message">
                                            @if ($errors->has('dob')) {{ $errors->first('dob') }} @endif
                                        </strong>
                                    </label>

                                        <input id="dob" type="date" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>

                                
                                </div>
                                

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-5">
                                    <label for="phone" class="small control-label">Telefon:
                                        <strong class="text-danger" id="phone_message">
                                            @if ($errors->has('phone')) {{ $errors->first('phone') }} @endif
                                        </strong>
                                    </label>

                                    
                                        <input id="phone" placeholder="044/049 000 000" type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                
                                </div>

                                <div class="col-7">
                                    <label for="email" class="small control-label">Email:
                                        <strong class="text-danger" id="email_message">
                                            @if ($errors->has('email')) {{ $errors->first('email') }} @endif
                                        </strong>
                                    </label>

                                    
                                        <input id="email" placeholder="shembull@mail.com" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-6">
                                    <label for="password" class="small control-label">Fjalkalimi:
                                        <strong class="text-danger" id="password_message">
                                            @if ($errors->has('password')) {{ $errors->first('password') }} @endif
                                        </strong>

                                    </label>
                                        <input id="password" placeholder="Mbi 6 karaktere" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>

                                </div>

                                <div class="col-6">

                                <label for="password-confirm" class="small control-label">Konfirmo Fjalkalimin:
                                    <strong class="text-danger" id="password-confirm_message">
                                        @if ($errors->has('password-confirm')) {{ $errors->first('password-confirm') }} @endif
                                    </strong>
                                </label>

                                
                                    <input id="password-confirm" placeholder="Mbi 6 karaktere" type="password" class="form-control {{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password-confirm" required>
                            
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-12">
                                
                                
                                    <button type="submit" class="btn btn-primary btn-block" onclick="attemptRegister();">
                                        Kyqu
                                    </button>

                                    
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
