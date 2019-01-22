@extends('layouts.app')

@section('content')


<div class="row justify-content-md-center align-items-center" style="min-height:90vh!important">
    <div class="col-md-5">
        <div class="card">

            <div class="card-body">
            <!-- {{$errors}} -->
            <h4 class="card-title">Kyqu</h4>
                <form id="login_form" method="POST" action="loginvalidation">
                    <div class="form-group">
                         {{ csrf_field() }}

                        <div class="form-group">
                            <label for="pid" class="small control-label">ID:
                                <strong class="text-danger" id="pid_message">
                                    @if ($errors->has('pid')) {{ $errors->first('pid') }} @endif
                                </strong>
                            </label>


                            <input id="pid" type="text" class="form-control {{ $errors->has('pid') ? ' is-invalid' : '' }}" name="pid" value="{{ old('pid') }}" required autofocus>



                        </div>

                        <div class="form-group">
                            <label for="password" class="small control-label">Fjalkalimi:
                                <strong class="text-danger" id="password_message">
                                    @if ($errors->has('password')) {{ $errors->first('password') }} @endif
                                </strong>
                            </label>


                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>

                        </div>

                        <div class="form-group">

                            <div class="checkbox">
                                <small>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Me kujto
                                </small>
                            </div>

                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary btn-block" onclick="">
                                Kyqu
                            </button>
                            <div class='group-row'>
                                <small class="text-muted">
                                    <a href="{{ route('password.request') }}">Ke harruar fjalkalimin?</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
