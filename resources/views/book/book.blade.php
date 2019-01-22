@extends('layouts.app')


@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Libri'])
@endsection

@section('content')

    <div class="row">

        <div class="col-md-10 ">

            <div class="card mb-5 py-3">

                <div class="container">

                    <div class="row mb-3 no-gutters">

                        <div class="col-md-4 mb-3 mb-md-0" >


                            <img src="{{asset('storage/book_covers/'.$book->cover_path)}}"
                                 class="img-fluid"
                                 alt="{{$book->title}}" style="min-width:100%!important">


                        </div>
                        
                        <div class="col-md-8">
                            <div class="container">
                                <div class="row">
                                    @auth
                                        @php
                                            $status = Auth::user()->savedBooks()->where('book_id',$book->id)->exists();
                                        @endphp
                                        <a      style="position: absolute; top:0;right: 0; z-index: 5;"
                                                id="bookMarkButton{{$book->id}}" onclick="saveBook('{{$book->id}}','{{csrf_token()}}');"
                                                class="bookMarkButton {{$status ? 'bookMarkOn' : 'bookMarkOff' }}">
                                                <i style="font-size: 52px" class="material-icons">bookmark</i>

                                        </a>
                                    @endauth
                                    @guest
                                        <a style="position: absolute; top:0;right: 0; z-index: 5;"
                                                id="bookMarkButton{{$book->id}}"
                                                data-toggle="modal" data-target="#loginModal"
                                                class="bookMarkButton bookMarkOff">
                                            <i style="font-size: 52px" class="material-icons">bookmark</i>
                                        </a>

                                    @endguest

                                    <div class="col-md-12">
                                        <h5 style="line-height: 1.2em; min-height: 3.6em;"
                                            class="font-weight-bold ">{{$book->title}}</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="text-muted small text-uppercase mb-0 pb-0">Autore:</p>
                                        <p class="mt-0 pt-0">
                                            @foreach($book->authors as $author)
                                                <a class="link-hover" href="/author/{{$author->id}}">{{$author->name}}</a>,
                                            @endforeach
                                        </p>


                                    </div>
                                    <div class="col-md-12">
                                        <p class="text-muted small text-uppercase mb-0 pb-0">Kategoria:</p>
                                        <p class="mt-0 pt-0">
                                            @foreach($book->categories as $subcategory)
                                                <a class="link-hover" href="/category/{{$subcategory->id}}">{{$subcategory->name}}</a>,

                                            @endforeach
                                        </p>

                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-6">

                                        <p class="text-muted small text-uppercase mb-0 pb-0">Shtepia Botuese:</p>
                                        <p class="mt-0 pt-0"><a
                                                    class="link-hover" href="/publisher/{{$book->publisher->id}}">{{$book->publisher->name}}</a>
                                        </p>


                                        <p class="text-muted small text-uppercase mb-0 pb-0">ISBN/ISSN:</p>
                                        <p class="mt-0 pt-0">
                                            @foreach($book->isbns as $isbn)
                                                {{$isbn->isbn}},
                                            @endforeach



                                        </p>


                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-muted small text-uppercase mb-0 pb-0">Viti i publikimit:</p>
                                        <p class="mt-0 pt-0">{{$book->pub_year}}</p>

                                        <p class="text-muted small text-uppercase mb-0 pb-0">Vetite fizike:</p>
                                        <p class="mt-0 pt-0">{{$book->properties}}</p>

                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-md-6">
                                        <p class="text-muted small text-uppercase mb-0 pb-0">Rezervime:</p>
                                        <p class="mt-0 pt-0">{{$book->onHold}}</p>

                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-muted small text-uppercase mb-0 pb-0">Te huazuara:</p>
                                        <p class="mt-0 pt-0">{{$book->currentlyBorrowed}}</p>

                                    </div>

                                </div>
                                <div class="row pt-5 mt-5">


                                    <div class="col-md-12" style="position:absolute; bottom:0!important">

                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">

                                                <p class="small text-uppercase font-weight-bold mb-0 pb-0">Të pranishme:</p>
                                                <p class="mt-0 pt-0">{{$book->availableStock}}</p>



                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                @auth
                                                    @php
                                                        $status = auth()->user()->getHasBookRequestedAttribute($book->id);
                                                    @endphp
{{--                                                    {{var_dump($status)}}--}}
                                                     @if($status)
                                                         {{--nese eshte libri i rezervuar, shfaq butonin me ngjyre te kuqe dhe kohen--}}
                                                        <div class="btn-group"  style="width: 100%;" role="group" aria-label="Ruaj ose Rezervo">
                                                            <button id="removeRequestButton" type="button" style="width: 100%" class="btn btn-warning"
                                                                    data-bookid="{{$book->id}}" data-csfr="{{csrf_token()}}"
                                                                    data-reqid="{{auth()->user()->getBookRequestIdAttribute($book->id)}}">
                                                                <span id="message">Me pak se {{$status}} ore!</span>
                                                                <span class="material-icons align-top">add_alarm</span>
                                                            </button>
                                                        </div>
                                                     @else
                                                         {{--nese nuk eshte libri i rezervuar shfaq butonin e kalter--}}
                                                        <div class="btn-group"  style="width: 100%;" role="group" aria-label="Ruaj ose Rezervo">
                                                            <button id="requestButton" type="button" style="width: 100%" class="btn btn-primary"
                                                                    data-bookid="{{$book->id}}" data-csfr="{{csrf_token()}}">
                                                                <span id="message">Rezervo</span>
                                                                <span class="material-icons align-top">add_alarm</span>
                                                            </button>
                                                        </div>
                                                     @endif





                                                    {{--<a      style="position: absolute; top:0;right: 0; z-index: 5;"--}}
                                                            {{--id="bookMarkButton{{$book->id}}" onclick="saveBook('{{$book->id}}','{{csrf_token()}}');"--}}
                                                            {{--class="bookMarkButton {{$status ? 'bookMarkOn' : 'bookMarkOff' }}">--}}
                                                        {{--<i style="font-size: 52px" class="material-icons">bookmark</i>--}}

                                                    {{--</a>--}}

                                                @endauth
                                                @guest
                                                        <div class="btn-group"  style="width: 100%" role="group" aria-label="Ruaj ose Rezervo">


                                                            <button type="button" style="width: 100%" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Rezervo <span class="material-icons align-top">add_alarm</span></button>

                                                        </div>


                                                    {{--<a      style="position: absolute; top:0;right: 0; z-index: 5;"--}}
                                                            {{--id="bookMarkButton{{$book->id}}"--}}
                                                            {{--data-toggle="modal" data-target="#loginModal"--}}
                                                            {{--class="bookMarkButton bookMarkOff">--}}
                                                        {{--<i style="font-size: 52px" class="material-icons">bookmark</i>--}}
                                                    {{--</a>--}}

                                                @endguest


                                                {{--<div class="btn-group"  style="width: 100%" role="group" aria-label="Ruaj ose Rezervo">--}}


                                                        {{--<button type="button" style="width: 100%" class="btn btn-primary">Rezervo <span class="material-icons align-top">add_alarm</span></button>--}}

                                                {{--</div>--}}






                                        </div>


                                    </div>


                                </div>

                            </div>

                        </div>


                    </div>
                    <div class="row mt-3">

                        <div class="col-md-4 mb-5 pr-md-0">
                            <h6 class="text-muted mb-3">Etiketimet</h6>
                            <hr class="">

                            <ul class="tags">
                                @foreach($book->tags as $tag)
                                    <li><a href="/tag/{{$tag->id}}" class="tag">{{$tag->name}}</a></li>
                                    {{--<span class="tag">{{$tag->tag}}</span>--}}
                                @endforeach
                            </ul>


                        </div>
                        <div class="col-md-8">
                            @isset($book->description)

                                <h6 class="text-muted mb-3">Pershkrimi</h6>

                                <hr class="">
                                <p>{{$book->description}}</p>

                            @endisset

                        </div>
                    </div>


                </div>

            </div>

            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="row no-gutters justify-content-between">
                        <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Nga kategoria e njejte</h5>
                        {{--<a href="" class="text-muted">Me shume<i class="material-icons" style="vertical-align: top">keyboard_arrow_right</i></a>--}}
                    </div>
                    <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">

                </div>


                @php
                    $books = $book->categoryBooks;
                @endphp

                @foreach($books as $th_book)
                    <div class="col-md-3">
                    @if($th_book->name != $book->name)
                    
                        @includeIf('partials.book_thumbnail')
                    @endif
                    </div>
                @endforeach

            </div>

        </div>
        <div class="col-md-2 sidebar ">
            @includeIf('partials.sidebar')


        </div>

        {{--<div class="col-md-10 pull-left card mb-3" style="">--}}
        {{----}}
        {{--<!-- </div> -->--}}
        {{--</div>--}}

    </div>



@endsection
