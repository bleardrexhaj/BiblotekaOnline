@extends('layouts.app')
@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Shtëpia botuese'])
@endsection
@section('content')

    <div class="row">


        <div class="col-md-10 ">
            <div class="row mb-3">
                <div class="col-md-12 pb-3">
                    {{--<p class="small text-uppercase text-muted p-0 m-0">Emri:</p>--}}
                    <h2 class="font-weight-bold m-0 p-0">{{$publisher->name}}</h2>
                </div>
                <div class="col-md-3">

                    <p class="small text-uppercase text-muted mb-0">Numri i librave:</p>
                    <p class="font-weight-bold mt-0">{{$publisher->numberOfBooks}}</p>

                </div>
                <div class="col-md-9 align-self-center">
                    @isset($publisher->info)

                        <p class="small text-uppercase  text-muted mb-0">Info:  </p>
                        <p class="mt-0">{{$publisher->info}}</p>



                    @endisset

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="row no-gutters justify-content-between">
                        <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Librat</h5>
                        {{--<a href="" class="text-muted">Me shume<i class="material-icons" style="vertical-align: top">keyboard_arrow_right</i></a>--}}
                    </div>
                    <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">


                </div>

                @php
                    $books = $publisher->books;
                @endphp

                @foreach($books as $th_book)
                    <div class="col-md-6">
                        @includeIf('partials.vertical_book_thumbnail')
                    </div>
                @endforeach




            </div>
        </div>
        <div class="col-md-2 sidebar">
            @includeIf('partials.sidebar')


        </div>

        {{--<div class="col-md-10 pull-left card mb-3" style="">--}}
        {{----}}
        {{--<!-- </div> -->--}}
        {{--</div>--}}

    </div>



@endsection
