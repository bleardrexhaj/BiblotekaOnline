<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','Bibloteka') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- Material Icons from Google FOSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="{{ asset('css/font.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('open-iconic-master/font/css/open-iconic-bootstrap.css')}}">

   
    


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white mb-0">

    <div class="container">

        {{--<a class="navbar-brand" href="{{ url('/') }}"><span class="icon-university"></span>{{config('app.name', 'Laravel')}}
        </a>--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link @if(\Request::is('/')) active @endif" href="/">Ballina<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link @if(\Request::is('category')) active @endif" href="/category">Kategorite</a>
                <a class="nav-item nav-link @if(\Request::is('browse')) active @endif" href="/browse">Shfleto</a>
                {{--<a class="nav-item nav-link @if(\Request::is('pricing')) active @endif" href="#">Pricing</a>--}}
                <a class="nav-item nav-link @if(\Request::is('bibloteka')) active @endif" href="/bibloteka">Bibloteka</a>
                <a class="nav-item nav-link @if(\Request::is('qysh-me')) active @endif" href="/qysh-me">Qysh me...</a>
            </div>


            <div class="navbar-nav">
                @guest

                    <a class="nav-item nav-link @if(\Request::is('login')) active @endif" href="{{ route('login') }}">Kyqu</a>
                    <a class="nav-item nav-link @if(\Request::is('register')) active @endif" href="{{ route('register') }}">Regjistrohu</a>
                    @else
                        @if(Auth::user()->isAdmin())
                            <a class="nav-link font-weight-bold text-danger" href="/admin">Admin</a>
                        @elseif(Auth::user()->user_type == 'user' && Auth::user()->parent_id == null)
                            <a class="nav-item nav-link font-weight-bold text-danger @if(\Request::is('childregister')) active @endif" href="/childregister">Regjistro Femijen</a>
                        @endif

                        <li class="nav-item dropdown @if(\Request::is('home')) active @endif">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/home">Profili</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Dil
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </div>
                        </li>
                        @endguest
            </div>
        </div>
        <!-- </div> -->
    </div>
</nav>
@yield('page-header')
<div class="container">
    @yield('content')

</div>

<div class="footer pb-0 pt-2">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
        <h5>e-Bibloteka</h5>
            </div>
            <div class="col-md-9">
                <p>Te gjitha te drejtat te rezervara 2018.</p>
            </div>
        </div>

    </div>


</div>



<div id="loginModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Modali per kyqje" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Duhet te kyqeni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="login_form" method="POST" action="{{ route('login') }}">
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


                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        </div>

                        <div class="form-group">

                            <div class="checkbox">
                                <small>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Me kujto
                                </small>
                            </div>

                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary btn-block" onclick="attemptLogin();">
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

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">


    $(window).ready(function() {
        var $items = $('*#item_thumbnail');
        var $SearchInput = $('#instant_search');
        var clicked = false;


//            var $bootstrapContainer = $($items).attr('class');
        $('#sortByNameAZ').on('click', function () {

            var $sortedByName = $items.sort(function (a, b) {
                return $(a).data('text').toUpperCase().localeCompare($(b).data('text').toUpperCase());
            });
            $("#itemsContainer").html($sortedByName);

        })

        $('#sortByNameZA').on('click', function () {

            var $sortedByName = $items.sort(function (a, b) {
                return $(b).data('text').toUpperCase().localeCompare($(a).data('text').toUpperCase());
            });
            $("#itemsContainer").html($sortedByName);

        });

        $('#sortByQuantity').on('click', function () {

            var $sortedByName = $items.sort(function (a, b) {
                return $(b).data('quantity') - $(a).data('quantity');
            });
            $("#itemsContainer").html($sortedByName);

        });

        $($SearchInput).on('keyup', function () {
            var $tmpResult = _.filter($items, function (item) {
                return $(item).data('text').includes($($SearchInput).val());
            });
            $('#itemsContainer').html($tmpResult);

        });
        $('#showAll').on('click', function () {

            $('#itemsContainer').html($items);
        });


        $('#removeRequestButton').on('click', function () {
            var req_id = $('#removeRequestButton').data('reqid');
            var csfr = $('#removeRequestButton').data('csfr');
            if(clicked){

                alert('Rifresko Faqen');
                return;
            }if(clicked){ return;}
            $.ajax({
                url: '/request/'+req_id,
                type: 'POST',
                data: {
                    _method:'DELETE',
                    "_token": csfr
                },
                success: function (data) {
                    
                    removeRequestButton = $('#removeRequestButton');
//                    $(removeRequestButton).removeClass('disabled');
                    $(removeRequestButton).removeClass('btn-warning');
                    $(removeRequestButton).addClass('btn-primary');
                    $(removeRequestButton).find('#message').html('Rezervo');

                    $(removeRequestButton).attr('id', 'requestButton');
                    clicked = true;


//                    $(display).attr('id', 'requestButton');
                },
                error: function (xhr, b, c) {
                    console.log(xhr);
                    console.log(c);
                    console.log(b);


                }
            });
        });


        $('#requestButton').on('click', function () {
            var book_id = $('#requestButton').data('bookid');
            var csfr = $('#requestButton').data('csfr');
            if(clicked){

                alert('Rifresko Faqen');
                return;
            }
            $.ajax({
//                dataType: 'json',
                type: 'POST',
                url: '/request',
                data: {"book_id": book_id, "_token": csfr},
                success: function (data) {

                    requestButton = $('#requestButton');
                    $(requestButton).attr('data-reqid', data.req_id + '');
                    $(requestButton).addClass('disabled');
                    $(requestButton).addClass('btn-warning');
                    $(requestButton).removeClass('btn-primary');
                    $(requestButton).find('#message').html('Me pak se ' + data.timeLeft + ' ore!');

                    $(requestButton).attr('id', 'removeRequestButton');
                    clicked = true;
                },
                error: function (xhr, status, error) {
                    
                    response = $.parseJSON(xhr.responseText);
                    alert(response);
                    //console.log(response);
                    //console.log(status);
                    //console.log(error);

                }
            });
        });

    });

    function saveBook(book_id, csfr) {
        var button = $('*#bookMarkButton' + book_id);
        $.ajax({
//                dataType: 'json',
            type: 'POST',
            url: '/savebook',
            data: {"book_id": book_id, "_token": csfr},
            success: function (data) {
                if(button.hasClass('bookMarkOff')){
                    button.removeClass('bookMarkOff');
                    button.addClass('bookMarkOn');
                }else{
                    button.removeClass('bookMarkOn');
                    button.addClass('bookMarkOff');
                }

                if (button.hasClass('text-secondary')) {
                    button.removeClass('text-secondary');
                    button.addClass('text-success');
                }
                else {
                    button.removeClass('text-success');
                    button.addClass('text-secondary');
                }
            }


        })
    }

    function attemptLogin() {
        var form = $('#login_form');
        var form_action = form.attr('action');
        var method = form.attr('method');
        var pidFiled = $('input[name=pid]');
        var passField = $('input[name=password]');
        var data = form.serialize();

        form.on('submit', function (e) {
            e.preventDefault();
            $.post({
                type: method,
                url: form_action,
                data: data,
                success: function (data, textStatus,jqXHR) {
                    location.reload();
                },
                error: function (data, textStatus, jqXHR) {
                    response = $.parseJSON(data.responseText);
                    if("pid" in response.errors){
                        pidFiled.addClass('is-invalid');
                        $('#pid_message').html(response.errors['pid']);
                        passField.addClass('is-invalid');
                        $('#password_message').html(response.errors['pid']);
                    }
                    if("password" in response.errors){
                        passField.addClass('is-invalid');
                        $('input[name=pid] >.invalid-feedback').html(response.errors['password']);
                    }


                }
            });

        });

    }

    function attemptRegister() {
        var form = $('#register_form');
        var form_action = form.attr('action');
        var method = form.attr('method');
        var data = form.serializeArray();

        form.on('submit', function (e) {
            e.preventDefault();
            $.post({
                type: method,
                url: form_action,
                data: data,
                success: function (data, textStatus,jqXHR) {
                    location.reload();
                },
                error: function (data, textStatus, jqXHR) {
                    response = $.parseJSON(data.responseText);
                    if("pid" in response.errors){
                        $('input[name=pid]').addClass('is-invalid');
                        $('#pid_message').html(response.errors['pid']);
                    }
                    if("name" in response.errors){
                        $('input[name=name]').addClass('is-invalid');
                        $('#name_message').html(response.errors['name']);
                    }
                    if("surname" in response.errors){
                        $('input[name=surname]').addClass('is-invalid');
                        $('#surname_message').html(response.errors['surname']);
                    }
                    if("address" in response.errors){
                        $('input[name=address]').addClass('is-invalid');
                        $('#address_message').html(response.errors['address']);
                    }
                    if("dob" in response.errors){
                        $('input[name=dob]').addClass('is-invalid');
                        $('#dob_message').html(response.errors['dob']);
                    }
                    if("phone" in response.errors){
                        $('input[name=phone]').addClass('is-invalid');
                        $('#phone_message').html(response.errors['phone']);
                    }
                    if("email" in response.errors){
                        $('input[name=email]').addClass('is-invalid');
                        $('#email_message').html(response.errors['email']);
                    }
                    if("password" in response.errors){
                        $('input[name=password]').addClass('is-invalid');
                        $('#password_message').html(response.errors['password']);
                    }
                    if("password-confirm" in response.errors){
                        $('input[name=password-confirm]').addClass('is-invalid');
                        $('#password-confirm_message').html(response.errors['password-confirm']);
                    }


                }
            });

        });

    }

</script>
<script>
      var map;
      

      function initMap() {
        var myLatLng = {lat: 42.205993, lng: 20.725445};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Bibloteka'
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4ONKwFwKN3Qk4wihyryon8V_M4v0Z8xE&callback=initMap"
    async defer></script>


</body>
</html>
