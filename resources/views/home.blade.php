@extends('layouts.app')
@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Llogaria '])
@endsection
@section('content')
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <div class="row mb-3">
        @php
            $user = auth()->user();
        @endphp



        <div class="col-md-12 pb-3">

            <h3 class="font-weight-bold m-0 p-0">{{$user->name}}</h3>
        </div>



        <div class="col-md-2">

            <p class="small text-uppercase text-muted mb-0">ID:</p>
            <p class="font-weight-bold mt-0">{{$user->pid}}</p>

        </div>

        <div class="col-md-2">

            <p class="small text-uppercase text-muted mb-0">Datelindja:</p>
            <p class=" mt-0">{{$user->dob}}</p>

        </div>
        <div class="col-md-2">

            <p class="small text-uppercase text-muted mb-0">Adresa:</p>
            <p class=" mt-0">{{$user->address}}</p>

        </div>
        <div class="col-md-3">

            <p class="small text-uppercase text-muted mb-0">Email:</p>
            <p class=" mt-0">{{$user->email}}</p>

        </div>
        <div class="col-md-1">

            <p class="small text-uppercase text-muted mb-0">Telefon:</p>
            <p class=" mt-0">{{$user->phone}}</p>

        </div>


        {{--<div class="col-md-2">--}}
            {{--<div class="dropdown mr-0">--}}
                {{--<button--}}
                        {{--class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"--}}
                        {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--Llogaria--}}
                {{--</button>--}}
                {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                    {{--<a class="dropdown-item" href="#">Permiso te dhenat</a>--}}
                    {{--<a class="dropdown-item text-danger" href="#">Fshije llogarine</a>--}}
                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    {{--<div class="row">--}}







    {{--<div class="col">--}}
    {{--<div class="row justify-content-center ">--}}

    {{--<i class="material-icons" style="font-size:130px; color:teal">account_circle</i>--}}
    {{--</div>--}}

    {{--<h3 class="text-center font-weight-bold">{{Auth::user()->name}}</h3>--}}

    {{--<br>--}}


    {{--<ul class="nav nav-pills nav-fill">--}}
    {{--<li class="nav-item">--}}
    {{--<div>--}}
    {{--<small>ID:</small>--}}
    {{--<p>{{Auth::user()->pid}}</p>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--<li class="nav-item">--}}
    {{--<div>--}}
    {{--<small>Datelindja:</small>--}}
    {{--<p>{{Auth::user()->dob}}</p>--}}
    {{--</div>--}}
    {{--</li>--}}

    {{--<li class="nav-item">--}}
    {{--<div>--}}
    {{--<small>Adresa:</small>--}}
    {{--<p>{{Auth::user()->address}}</p>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--<li class="nav-item">--}}
    {{--<div>--}}
    {{--<small>Email:</small>--}}
    {{--<p>{{Auth::user()->email}}</p>--}}
    {{--</div>--}}
    {{--</li>--}}

    {{--<li class="nav-item">--}}
    {{--<div>--}}
    {{--<small>Telefon:</small>--}}
    {{--<p>{{Auth::user()->phone}}</p>--}}
    {{--</div>--}}
    {{--</li>--}}

    {{--<li class="nav-item">--}}
    {{--<div class="dropdown mt-1">--}}
    {{--<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"--}}
    {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
    {{--Llogaria--}}
    {{--</button>--}}
    {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
    {{--<a class="dropdown-item" href="#">Permiso te dhenat</a>--}}
    {{--<a class="dropdown-item text-danger" href="#">Fshije llogarine</a>--}}
    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--<button type="button" class="btn btn-light"><i class="material-icons">mode_edit</i></button>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--<button style ="position: absolute; top:0em; right:1.5em;" type="button" class="btn btn-info btn-sm">Ndrysho te dhenat</button>--}}


    {{--</div>--}}
    {{--</div>--}}
                @php
                    $bookRequests = auth()->user()->requests()->get()->reverse();
                    $minors = auth()->user()->minors;
                    $rowCount = 1;

                @endphp
    <div class="row mb-3">
        <div class="col-md-12 ">
            @isset($t) <h5 class="mb-0 pb-3" style="font-color:red; color:red;">{{$t}}</h5> @endisset
            @if($minors->count() != 0)
            
            <div class="row no-gutters justify-content-between">


                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Femijet</h5>

                

            </div>
            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">
            <div class="collapse mb-2 pt-0" id="requestCollapse">

                <div class="row justify-content-end">



                   
                    
                    
                </div>
            </div>




        </div>

        <div class="col-md-12" >
            <div class="row" id="itemsContainer">

                
                
                <div class="col-md-12">
                @if($minors != null)
                    <table class="table table-hover bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pid</th>
                            <th scope="col">Emri Dhe Mbiemri</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody id="row_container">
                        @foreach($minors as $minor)
                        @if($minor != null)

                                <th scope="row">{{$rowCount}}</th>
                                <td>{{$minor->pid}}</td>
                                
                                <td>{{$minor->name}}</td>
                               
                            </tr>
                            @php
                                $rowCount++;
                            @endphp
                        
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

        </div>
    </div>
    @endif
    



    <div class="row mb-3">
        <div class="col-md-12 ">

            <div class="row no-gutters justify-content-between">

                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Rezervimet</h5>

                <div class="pt-1">
                    <a href="#requestCollapse" class="text-dark px-2" data-toggle="collapse" aria-haspopup="true" aria-expanded="false"><i class="material-icons">filter_list</i></a>
                </div>

            </div>
            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">
            <div class="collapse mb-2 pt-0" id="requestCollapse">

                <div class="row justify-content-end">



                    <div class="btn-group-sm pr-2" role="group">
                        <a id="btnGroupDrop1" class="btn btn-link dropdown-toggle mt-0 pt-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons align-text-top" style="font-size: 1.3em">sort</i>
                            Filtro
                        </a>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a id="showAll" class="dropdown-item" href="#">Te gjitha</a>
                            <a id="" class="dropdown-item" href="#">Vetem aktive</a>
                            <a id="" class="dropdown-item" href="#">Te skaduara</a>
                            {{--<a class="dropdown-item" href="#">Sipas sasise</a>--}}
                        </div>
                    </div>
                    <div class="btn-group-sm pr-2" role="group">
                        <a id="btnGroupDrop2" class="btn btn-link dropdown-toggle mt-0 pt-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons align-text-top" style="font-size: 1.3em">sort_by_alpha</i>
                            Renditi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                            <a id="sortByBookNameAZ" class="dropdown-item" href="#">Sipas librit A-Z</a>
                            <a id="sortByBookNameZA" class="dropdown-item" href="#">Sipas librit Z-A</a>
                            <a id="sortByDateNewest" class="dropdown-item" href="#" >Nga me e reja</a>
                            <a id="sortByDateOldest" class="dropdown-item" href="#" >Nga me e vjetra</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">

                        <input type="text" class="col-sm-12" id="instant_search" placeholder="Kerko" autofocus>
                    </div>

                </div>
            </div>




        </div>


        <div class="col-md-12" >
            <div class="row" id="itemsContainer">

                @php
                    $bookRequests = auth()->user()->requests()->get()->reverse();
                    $rowCount = 1;

                @endphp
                <div class="col-md-12">
                    <table class="table table-hover bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Libri</th>
                            <th scope="col">Data e rezervimit</th>
                            <th scope="col">Statusi</th>
                        </tr>
                        </thead>
                        <tbody id="row_container">
                        @foreach($bookRequests as $request)
                        @if($request->borrow != null)

                        @else
                            <tr id="request_table_row" data-booktitle="{{$request->book->title}} " data-requestdate="{{$request->req_start}}" data-status="{{$request->status}}" >
                                <th scope="row">{{$rowCount}}</th>
                                <td>{{$request->book->title}}</td>
                                <td>{{$request->req_start}}</td>
                                <td>{{$request->status}}</td>
                            </tr>
                            @php
                                $rowCount++;
                            @endphp
                        
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <div class="row mb-3">
        <div class="col-md-12 ">

            <div class="row no-gutters justify-content-between" id="itemsContainer">

                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Huazimet</h5>

                <div class="pt-1">
                    <a href="#BorrowCollapse" class="text-dark px-2" data-toggle="collapse" aria-haspopup="true" aria-expanded="false"><i class="material-icons">filter_list</i></a>
                </div>

            </div>
            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">
            <div class="collapse mb-2 pt-0" id="BorrowCollapse">

                <div class="row justify-content-end">



                    <div class="btn-group-sm pr-2" role="group">
                        <a id="btnGroupDrop1" class="btn btn-link dropdown-toggle mt-0 pt-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons align-text-top" style="font-size: 1.3em">sort</i>
                            Filtro
                        </a>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a id="showAll" class="dropdown-item" href="#">Te gjitha</a>
                            <a id="" class="dropdown-item" href="#">Vetem aktive</a>
                            <a id="" class="dropdown-item" href="#">Te skaduara</a>
                            {{--<a class="dropdown-item" href="#">Sipas sasise</a>--}}
                        </div>
                    </div>
                    <div class="btn-group-sm pr-2" role="group">
                        <a id="btnGroupDrop2" class="btn btn-link dropdown-toggle mt-0 pt-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons align-text-top" style="font-size: 1.3em">sort_by_alpha</i>
                            Renditi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                            <a id="sortByBookNameAZ" class="dropdown-item" href="#">Sipas librit A-Z</a>
                            <a id="sortByBookNameZA" class="dropdown-item" href="#">Sipas librit Z-A</a>
                            <a id="sortByDateNewest" class="dropdown-item" href="#" >Nga me e reja</a>
                            <a id="sortByDateOldest" class="dropdown-item" href="#" >Nga me e vjetra</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">

                        <input type="text" class="col-sm-12" id="instant_search" placeholder="Kerko" autofocus>
                    </div>

                </div>
            </div>




        </div>


        <div class="col-md-12" >
            <div class="row" id="itemsContainer">

                @php
                    $bookRequests = auth()->user()->requests()->get()->reverse();
                    $rowCount = 1;

                @endphp
                <div class="col-md-12">
                    <table class="table table-hover bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Libri</th>
                            <th scope="col">Data e rezervimit</th>
                            <th scope="col">Statusi</th>
                        </tr>
                        </thead>
                        <tbody id="row_container">
                        @foreach($bookRequests as $request)

                            <tr id="request_table_row" data-booktitle="{{$request->book->title}} " data-requestdate="{{$request->req_start}}" data-status="{{$request->status}}" >
                                <th scope="row">{{$rowCount}}</th>
                                <td>{{$request->book->title}}</td>
                                <td>{{$request->req_start}}</td>
                                <td>{{$request->status}}</td>
                            </tr>
                            @php
                                $rowCount++;
                            @endphp

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12 ">

            <div class="row no-gutters justify-content-between">

                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Librat e ruajtur</h5>

                <div class="pt-1">
                    <a href="#savedBooksCollapse" class="text-dark px-2" data-toggle="collapse" aria-haspopup="true" aria-expanded="false"><i class="material-icons">filter_list</i></a>
                </div>

            </div>
            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">
            <div class="collapse mb-2 pt-0" id="savedBooksCollapse">

                <div class="row justify-content-end">



                    <div class="btn-group-sm pr-2" role="group">
                        <a id="btnGroupDrop1" class="btn btn-link dropdown-toggle mt-0 pt-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons align-text-top" style="font-size: 1.3em">sort</i>
                            Filtro
                        </a>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a id="showAll" class="dropdown-item" href="#">Te gjitha</a>
                            <a id="" class="dropdown-item" href="#">Vetem aktive</a>
                            <a id="" class="dropdown-item" href="#">Te skaduara</a>
                            {{--<a class="dropdown-item" href="#">Sipas sasise</a>--}}
                        </div>
                    </div>
                    <div class="btn-group-sm pr-2" role="group">
                        <a id="btnGroupDrop2" class="btn btn-link dropdown-toggle mt-0 pt-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons align-text-top" style="font-size: 1.3em">sort_by_alpha</i>
                            Renditi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                            <a id="sortByBookNameAZ" class="dropdown-item" href="#">Sipas librit A-Z</a>
                            <a id="sortByBookNameZA" class="dropdown-item" href="#">Sipas librit Z-A</a>
                            <a id="sortByDateNewest" class="dropdown-item" href="#" >Nga me e reja</a>
                            <a id="sortByDateOldest" class="dropdown-item" href="#" >Nga me e vjetra</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">

                        <input type="text" class="col-sm-12" id="instant_search" placeholder="Kerko" autofocus>
                    </div>

                </div>
            </div>




        </div>


        <div class="col-md-12" >
            <div class="row">

                @php
                    $savedBooks = auth()->user()->savedBooks()->get();
                    $rowCount = 1;

                @endphp
                <div class="col-md-12">
                    <table id="savedBooksTable" class="table table-hover bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Libri</th>
                            <th scope="col">Autori</th>
                            {{--<th scope="col">Statusi</th>--}}
                        </tr>
                        </thead>
                        <tbody id="row_container">
                        @foreach($savedBooks as $book)

                            <tr id="request_table_row" data-booktitle="{{$book->title}} " >
                                <th scope="row">{{$rowCount}}</th>
                                <td>{{$book->title}}</td>
                                <td>@foreach($book->authors as $author){{$author->name}}{{", "}}@endforeach</td>
                                {{--<td>{{$request->status}}</td>--}}
                            </tr>
                            @php
                                $rowCount++;
                            @endphp

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


@endsection
