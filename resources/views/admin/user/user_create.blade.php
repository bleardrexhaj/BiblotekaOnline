@extends('admin.layouts.admin_layout')

@section('content')


    <div class="card mb-3">
        <div class="card-header">
            Shto Antarin e Ri
        </div>
        <div class="card-body px-5">
            <form action="/user/register" method="POST">
                {{csrf_field()}}
                
                <div class="form-row">
                    <label for="pid" class="col-sm-3 col-form-label">Numri i identifikimit:
                    <strong class="text-danger" id="pid_message">
                       @if ($errors->has('pid')) {{ $errors->first('pid') }} @endif
                     </strong></label>
                    <div class="form-group col-md-8">
                        <input id="pid" placeholder="Personal/Student ID" type="text" class="form-control {{ $errors->has('pid') ? ' is-invalid' : '' }}" name="pid" value="{{ old('pid') }}" required autofocus>

                    </div>
                </div>

                <div class="form-row">
                    <label for="Name" class="col-sm-3 col-form-label">Emri:
                    <strong class="text-danger" id="name_message">
                       @if ($errors->has('name')) {{ $errors->first('name') }} @endif
                     </strong>
                    </label>
                    <div class="form-group col-md-8">

                        <input id="name" placeholder="Emri" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                    </div>
                </div>

                <div class="form-row">
                    <label for="Name" class="col-sm-3 col-form-label">Mbiemri:
                    <strong class="text-danger" id="surname_message">
                       @if ($errors->has('surname')) {{ $errors->first('surname') }} @endif
                     </strong>
                    </label>
                    <div class="form-group col-md-8">

                        <input id="name" placeholder="Mbiemri" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="surname" value="{{ old('name') }}" required>

                    </div>
                </div>
               
                <div class="form-row">
                    <label for="Date of Birth" class="col-sm-3 col-form-label">Date of Birth:
                    <strong class="text-danger" id="dob_message">
                       @if ($errors->has('dob')) {{ $errors->first('dob') }} @endif
                     </strong>
                    </label>
                    <div class="form-group col-md-8">

                        <input id="dob" type="date" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>

                    </div>
                </div>

                 <div class="form-row">
                    <label for="Address" class="col-sm-3 col-form-label">Adresa:
                    <strong class="text-danger" id="address_message">
                       @if ($errors->has('address')) {{ $errors->first('address') }} @endif
                     </strong>
                    </label>
                    <div class="form-group col-md-8">

                        <input id="address" placeholder="Fshati/Qyteti, Komuna" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required >

                    </div>
                    </div>

                <div class="form-row">
                    <label for="stock" class="col-sm-3 col-form-label">Telefoni:
                    <strong class="text-danger" id="phone_message">
                       @if ($errors->has('phone')) {{ $errors->first('phone') }} @endif
                     </strong>
                    </label>
                    <div class="form-group col-md-8">

                       <input id="phone" placeholder="044/049 000 000" type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                    </div>
                </div>

               

                <div class="form-row">
                    <label for="email" class="col-sm-3 col-form-label">Email:
                    <strong class="text-danger" id="email_message">
                       @if ($errors->has('email')) {{ $errors->first('email') }} @endif
                     </strong>
                    </label>
                    <div class="form-group col-md-5">

                          <input id="email" placeholder="shembull@mail.com" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    </div>

                </div>
                

                <div class="form-row">
                    <label for="email" class="col-sm-3 col-form-label">Password:
                    <strong class="text-danger" id="pid_message">
                       @if ($errors->has('password')) {{ $errors->first('password') }} @endif
                     </strong>
                    </label>
                    <div class="form-group col-md-5">

                          <input id="password" placeholder="Mbi 6 karaktere" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>

                    </div>

                </div>

                <div class="form-row">
                    <label for="email" class="col-sm-3 col-form-label">Confirm Password:
                    <strong class="text-danger" id="pid_message">
                       @if ($errors->has('password-confirm')) {{ $errors->first('password-confirm') }} @endif
                     </strong>
                    </label>
                    <div class="form-group col-md-5">

                          <input id="password-confirm" placeholder="Mbi 6 karaktere" type="password" class="form-control {{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password-confirm" required>

                    </div>

                </div>

                <div class="form-row">
                    <label for="user_type" class="col-sm-3 col-form-label">User Type
                     @if ($errors->has('user_type')) {{ $errors->first('user_type') }} @endif
                    </label>

                    <div class="form-group col-md-5">

                        <select id="user_type" name="user_type" class="form-control form-control-chosen">
                            <option value="-1">Zgjedh llojin e perodruesit</option>
                            
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            
                        </select>

                    </div>

                </div>

                <div class="form-row">
                    <label for="email" class="col-sm-3 col-form-label">Regjistro userin
                    <strong class="text-danger" id="pid_message">
                       @if ($errors->has('pid')) {{ $errors->first('pid') }} @endif
                     </strong>
                    </label>
                    <div class="form-group col-md-5">

                          
                                    <button type="submit" class="btn btn-primary btn-block" onclick="attemptRegister();">
                                        Regjistro Perdoruesin
                                    </button>

                    </div>

                </div>
                



                



                

                
            </form>
        </div>
    </div>
       





@endsection