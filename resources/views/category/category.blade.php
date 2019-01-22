@extends('layouts.app')
@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Kategoria'])
@endsection
@section('content')

    <div class="row">


        <div class="col-md-10 ">
            <div class="row mb-3">
                <div class="col-md-12">
                @includeIf('partials.category_breadcrumb')

                </div>
                <div class="col-md-12 pb-3">
                    {{--<p class="small text-uppercase text-muted p-0 m-0">Emri:</p>--}}
                    <h2 class="font-weight-bold m-0 p-0">{{$category->name}}</h2>
                </div>
                <div class="col-md-3">

                    <p class="small text-uppercase text-muted mb-0">Numri i librave:</p>
                    <p class="font-weight-bold mt-0">{{$category->numberOfBooks}}</p>

                </div>
                <div class="col-md-3">

                    <p class="small text-uppercase text-muted mb-0">Kategoria prind:</p>
                    @isset($category->parentCategory->name)
                    <a href="/category/{{$category->parentCategory->id}}" class="link-hover font-weight-bold mt-0">{{$category->parentCategory->name}}</a>
                    @else
                            <p class="font-weight-bold mt-0">Nuk ka</p>
                    @endisset

                </div>
                <div class="col-md-3">

                    <p class="small text-uppercase text-muted mb-0">Numri i nenkategorive:</p>
                    <p class="font-weight-bold mt-0">{{$category->numberOfSubcategories}}</p>

                </div>
                <div class="col-md-3">

                    <p class="small text-uppercase text-muted mb-0">KDU numri:</p>
                    <p class="font-weight-bold mt-0">{{$category->udc_code}}</p>

                </div>
                <div class="col-md-12 align-self-center">
                    @isset($category->description)

                        <p class="small text-uppercase  text-muted mb-0">Pershkrimi:  </p>
                        <p class="mt-0">{{$category->description}}</p>



                    @endisset

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="row no-gutters justify-content-between">
                        <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Nenkategorite</h5>
                        {{--<a href="" class="text-muted">Me shume<i class="material-icons" style="vertical-align: top">keyboard_arrow_right</i></a>--}}
                    </div>
                    <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">


                </div>

                @php
                    $subcategories = $category->childCategories;

                @endphp

                @foreach($subcategories as $subcategory)
                    <div class="col-md-6">
                        @includeIf('partials.subcategory_thumbnail')
                    </div>
                @endforeach




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
                    $books = $category->books;

                @endphp

                @foreach($books as $th_book)
                    <div class="col-md-4">
                        @includeIf('partials.book_thumbnail')
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
