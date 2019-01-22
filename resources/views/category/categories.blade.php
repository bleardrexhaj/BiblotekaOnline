@extends('layouts.app')
@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Kategorite'])
@endsection
@section('content')

    <div class="row">


        <div class="col-md-10 ">
            {{--<div class="row mb-3">--}}
                {{--<div class="col-md-12">--}}
                    {{--@includeIf('partials.category_breadcrumb')--}}

                {{--</div>--}}
                {{--<div class="col-md-12 pb-3">--}}
                    {{--<p class="small text-uppercase text-muted p-0 m-0">Emri:</p>--}}
                    {{--<h2 class="font-weight-bold m-0 p-0">{{$category->name}}</h2>--}}
                {{--</div>--}}
                {{--<div class="col-md-3">--}}

                    {{--<p class="small text-uppercase text-muted mb-0">Numri i librave:</p>--}}
                    {{--<p class="font-weight-bold mt-0">{{$category->numberOfBooks}}</p>--}}

                {{--</div>--}}
                {{--<div class="col-md-3">--}}

                    {{--<p class="small text-uppercase text-muted mb-0">Kategoria prind:</p>--}}
                    {{--@isset($category->parentCategory->name)--}}
                        {{--<a href="/category/{{$category->parentCategory->id}}" class="link-hover font-weight-bold mt-0">{{$category->parentCategory->name}}</a>--}}
                        {{--@else--}}
                            {{--<p class="font-weight-bold mt-0">Nuk ka</p>--}}
                            {{--@endisset--}}

                {{--</div>--}}
                {{--<div class="col-md-3">--}}

                    {{--<p class="small text-uppercase text-muted mb-0">Numri i nenkategorive:</p>--}}
                    {{--<p class="font-weight-bold mt-0">{{$category->numberOfSubcategories}}</p>--}}

                {{--</div>--}}
                {{--<div class="col-md-3">--}}

                    {{--<p class="small text-uppercase text-muted mb-0">KDU numri:</p>--}}
                    {{--<p class="font-weight-bold mt-0">{{$category->udc_code}}</p>--}}

                {{--</div>--}}
                {{--<div class="col-md-12 align-self-center">--}}
                    {{--@isset($category->description)--}}

                        {{--<p class="small text-uppercase  text-muted mb-0">Pershkrimi:  </p>--}}
                        {{--<p class="mt-0">{{$category->description}}</p>--}}



                    {{--@endisset--}}

                {{--</div>--}}
            {{--</div>--}}
            <div class="row">
                <div class="col-md-12 ">

                    <div class="row no-gutters justify-content-between">

                        <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Te gjitha kategorite</h5>

                        <div class="pt-1">
                                <a href="#collapseExample" class="text-dark px-2" data-toggle="collapse" aria-haspopup="true" aria-expanded="false"><i class="material-icons">filter_list</i></a>
                        </div>

                    </div>
                    <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">
                    <div class="collapse mb-2 pt-0" id="collapseExample">

                        <div class="row justify-content-end">



                            <div class="btn-group-sm pr-2" role="group">
                                <a id="btnGroupDrop1" class="btn btn-link dropdown-toggle mt-0 pt-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons align-text-top" style="font-size: 1.3em">sort</i>
                                    Filtro
                                </a>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a id="showAll" class="dropdown-item" href="#">Te gjitha</a>
                                    <a id="" class="dropdown-item" href="#">Hiq pa sasi</a>
                                    <a id="" class="dropdown-item" href="#">Hiq pa pershkrim</a>
                                    {{--<a class="dropdown-item" href="#">Sipas sasise</a>--}}
                                </div>
                            </div>
                            <div class="btn-group-sm pr-2" role="group">
                                <a id="btnGroupDrop2" class="btn btn-link dropdown-toggle mt-0 pt-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons align-text-top" style="font-size: 1.3em">sort_by_alpha</i>
                                    Renditi
                                </a>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                    <a id="sortByNameAZ" class="dropdown-item" href="#">Sipas emrit A-Z</a>
                                    <a id="sortByNameZA" class="dropdown-item" href="#">Sipas emrit Z-A</a>
                                    <a id="sortByQuantity" class="dropdown-item" href="#" >Sipas sasise</a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">

                                <input type="text" class="col-sm-12" id="instant_search" placeholder="Kerko" autofocus>
                            </div>

                        </div>
                    </div>




                </div>

                {{--@php--}}
                    {{--$subcategories = $category->childCategories;--}}

                {{--@endphp--}}
                <div class="col-md-12" >
                    <div class="row" id="itemsContainer">

                @foreach($categories as $subcategory)
                    <div class="col-md-6" id="item_thumbnail" data-text="{{$subcategory->name}} " data-id="{{$subcategory->id}}" data-quantity="{{$subcategory->numberOfBooks}}" >
                        @includeIf('partials.subcategory_thumbnail')
                    </div>
                @endforeach
                    </div>
                </div>



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
