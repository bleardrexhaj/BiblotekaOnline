<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bibloteka - Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>





    {{--Select with Search--}}
    <link href="https://haubek.github.io/dist/css/component-chosen.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand " href="index.html">e-Bibloteka</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            {{--Sot--}}
            <li class="nav-item @if(\Request::is('admin')) active @endif" data-toggle="tooltip" data-placement="right" title="Sot">
                <a class="nav-link" href="/admin">
                    <i class="fa fa-fw fa-calendar"></i>
                    <span class="nav-link-text">Sot</span>
                </a>
            </li>
            {{--//Sidebar Huazimi--}}
            <li class="nav-item @if(\Request::is('borrow/create')) active @endif" data-toggle="tooltip" data-placement="right" title="Regjistro huazimin e librit">
                <a class="nav-link text-info" href="/borrow/create">
                    <i class="fa fa-fw fa-retweet"></i>
                    <span class="nav-link-text">Huazim</span>
                </a>
            </li>
            {{--//Sidebar Kthimi--}}
            <li class="nav-item @if(\Request::is('return')) active @endif" data-toggle="tooltip" data-placement="right" title="Regjistro kthimin e librit">
                <a class="nav-link text-warning" href="/return">
                    <i class="fa fa-fw fa-undo"></i>
                    <span class="nav-link-text">Kthim</span>
                </a>
            </li>

            {{--Libraria--}}
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Antaret, Librat,Kategorite">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseLibrary" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-university"></i>
                    <span class="nav-link-text">Bibloteka</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseLibrary">
                    <li>
                        <a href="/borrow" class="nav-item @if(\Request::is('huazimet')) active @endif" >Huazimet</a>
                    </li>
                    <li>
                        <a href="/reserve" class="nav-item @if(\Request::is('rezervimet')) active @endif">Rezervimet</a>
                    </li>



                    <li>
                        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsers">Antaret</a>
                        <ul class="sidenav-third-level collapse" id="collapseUsers">
                           <!-- <li>
                                <a href="/user/Aprove">Aprovo antaret</a>
                            </li> -->
                            <li>
                                <a href="/user/all" class="nav-item @if(\Request::is('user/all')) active @endif">Shfaq antaret</a>
                            </li>
                            <li>
                                <a href="/user/create" class="nav-item @if(\Request::is('user/create')) active @endif">Shto antare</a>
                            </li>
                            <li>
                                <a href="/user/delete" class="nav-item @if(\Request::is('user/delete')) active @endif">Fshij Antare</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBooks">Librat</a>
                        <ul class="sidenav-third-level collapse" id="collapseBooks">
                            <li>
                                <a href="/book" class="nav-item @if(\Request::is('book')) active @endif">Te gjitha librat</a>
                            </li>
                            <li>
                                <a href="/book/create" class="nav-item @if(\Request::is('book/create')) active @endif">Shto Libra</a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCategories">Kategorite</a>
                        <ul class="sidenav-third-level collapse" id="collapseCategories">
                            <li>
                                <a href="/category/search">Kerko Kategori</a>
                            </li>
                            <li>
                                <a href="/category/add">Shto Kategori</a>
                            </li>
                            
                            <li>
                                <a href="/category/delete">Fshij Kateogori</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            {{--Perdoruesit--}}
            {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menagjo perdoruesit/antaret e biblotekes">--}}
                {{--<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">--}}
                    {{--<i class="fa fa-fw fa-users"></i>--}}
                    {{--<span class="nav-link-text">Antaret</span>--}}
                {{--</a>--}}
                {{--<ul class="sidenav-second-level collapse" id="collapseComponents">--}}

                    {{--<li>--}}
                        {{--<a href="navbar.html">Ne pritje per konfirmim</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="navbar.html">Kerko antaret</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="cards.html">Shto antare</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="cards.html">Fshij Antare</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--Faqja
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menagjo Ueb-faqen">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#websiteCollapseComponent" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Faqja</span>
                </a>
                <ul class="sidenav-second-level collapse" id="websiteCollapseComponent">

                    <li>
                        <a href="navbar.html">Ballina</a>
                    </li>
                    <li>
                        <a href="cards.html">Lajmrimet</a>
                    </li>
                    <li>
                        <a href="navbar.html">Artikujt</a>
                    </li>

                    <li>
                        <a href="cards.html">Faqja Bibloteka</a>
                    </li>
                </ul>
            </li>
            --}}

            {{--Settings
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Te dhenat dhe aranzhimi i biblotekes">
                <a class="nav-link" href="/admin">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="nav-link-text">Settings</span>
                </a>
            </li>
--}}
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--<i class="fa fa-fw fa-envelope"></i>--}}
                    {{--<span class="d-lg-none">Messages--}}
              {{--<span class="badge badge-pill badge-primary">12 New</span>--}}
            {{--</span>--}}
                    {{--<span class="indicator text-primary d-none d-lg-block">--}}
              {{--<i class="fa fa-fw fa-circle"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu" aria-labelledby="messagesDropdown">--}}
                    {{--<h6 class="dropdown-header">New Messages:</h6>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#">--}}
                        {{--<strong>David Miller</strong>--}}
                        {{--<span class="small float-right text-muted">11:21 AM</span>--}}
                        {{--<div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#">--}}
                        {{--<strong>Jane Smith</strong>--}}
                        {{--<span class="small float-right text-muted">11:21 AM</span>--}}
                        {{--<div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#">--}}
                        {{--<strong>John Doe</strong>--}}
                        {{--<span class="small float-right text-muted">11:21 AM</span>--}}
                        {{--<div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item small" href="#">View all messages</a>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--<i class="fa fa-fw fa-bell"></i>--}}
                    {{--<span class="d-lg-none">Alerts--}}
              {{--<span class="badge badge-pill badge-warning">6 New</span>--}}
            {{--</span>--}}
                    {{--<span class="indicator text-warning d-none d-lg-block">--}}
              {{--<i class="fa fa-fw fa-circle"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu" aria-labelledby="alertsDropdown">--}}
                    {{--<h6 class="dropdown-header">New Alerts:</h6>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#">--}}
              {{--<span class="text-success">--}}
                {{--<strong>--}}
                  {{--<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>--}}
              {{--</span>--}}
                        {{--<span class="small float-right text-muted">11:21 AM</span>--}}
                        {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#">--}}
              {{--<span class="text-danger">--}}
                {{--<strong>--}}
                  {{--<i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>--}}
              {{--</span>--}}
                        {{--<span class="small float-right text-muted">11:21 AM</span>--}}
                        {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#">--}}
              {{--<span class="text-success">--}}
                {{--<strong>--}}
                  {{--<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>--}}
              {{--</span>--}}
                        {{--<span class="small float-right text-muted">11:21 AM</span>--}}
                        {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item small" href="#">View all alerts</a>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<form class="form-inline my-2 my-lg-0 mr-lg-2">--}}
                    {{--<div class="input-group">--}}
                        {{--<input class="form-control" type="text" placeholder="Search for...">--}}
                        {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-primary" type="button">--}}
                  {{--<i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</li>--}}

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/home">Profili</a>
                    <a class="dropdown-item" data-toggle="modal" href="#" data-target="#logoutModal">Dil</a>



                </div>
            </li>


            {{--<li class="nav-item">--}}

            {{--</li>--}}
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        {{--<!-- Breadcrumbs-->--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li class="breadcrumb-item">--}}
                {{--<a href="/admin">Dashboard</a>--}}
            {{--</li>--}}
            {{--<li class="breadcrumb-item active">Blank Page</li>--}}
        {{--</ol>--}}

        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>e-Bibloteka 2017</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmo!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-5">Shtyp "Dil" me posht qe te largoheni.</div>
                <div class="modal-footer p-2">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kthehu</button>

                    <a class="btn btn-primary px-5" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Dil
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>



    {{--<script src="vendor/jquery/jquery.min.js"></script>--}}
    {{--<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    {{--<script src="vendor/jquery-easing/jquery.easing.min.js"></script>--}}

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.js') }}"></script>
    {{--<script src="js/sb-admin.min.js"></script>--}}



    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
</div>
<script>
 

  function checkForm(form)
  {
    form.submit_btn.disabled = true;
    return true;
  }

    function confirmSubmit(event) {

        if(!confirm('Konfirmo! Shtyp "OK".'))
            event.preventDefault();

    }



    function showImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)

                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }else{
            $('#blah')
                .attr('src', '');
        }
    }




</script>
</body>

</html>
