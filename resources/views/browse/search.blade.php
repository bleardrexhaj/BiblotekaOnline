@extends('layouts.app')
@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Rezultatet e kerkimit për "'.$term.'"'])
@endsection

@section('content')



    <div class="row">


        @if($books->count()>0||$authors->count()>0||$tags->count()>0)
            <div class="col-md-10 ">
                <div class="row">
                    <div class="col-md-12">
                        
                            <p class="text-muted small">Gjithesej:
                                @if($books->count()>0){{$books->count()}} libra, @endif
                                @if($authors->count()>0){{$authors->count()}} autore, @endif
                                @if($tags->count()>0){{$tags->count()}} etiketime, @endif
                                @if($categories->count()>0){{$categories->count()}} kategori, @endif
                            </p>
                        
                    </div>
                </div>

                {{--//BOOKS--}}
                @if($books->count()>0)
                <div class="row mb-3">
                    <div class="col-md-12">

                        <div class="row no-gutters justify-content-between">
                            <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Libra <span style="font-size: 14px;" class="badge small badge-info">{{$books->count()}}</span></h5>

                            <a class="text-muted align-self-center px-3" data-toggle="collapse" href="#collapseLibrat">
                                Fshihe</a>
                        </div>
                        <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">



                    </div>

                    <div class=" collapse show" id="collapseLibrat">

                            <div class="col-md-12">
                                <div class="row">
                                @foreach($books as $th_book)
                                    <div class="col-md-3">
                                        @includeIf('partials.book_thumbnail')
                                    </div>
                                @endforeach
                </div>
                            </div>

                    </div>


                </div>
                @endif
                {{--//Authors--}}
                @if($authors->count()>0)
                <div class="row mb-3">
                    <div class="col-md-12">

                        <div class="row no-gutters justify-content-between">
                            <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Autore <span style="font-size: 14px;" class="badge small badge-info">{{$authors->count()}}</span></h5>

                            <a class="text-muted align-self-center px-3" data-toggle="collapse" href="#collapseAutore">
                                Fshihe</a>
                        </div>
                        <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">



                    </div>
                    <div class="col-md-12 collapse show" id="collapseAutore">
                        <div class="row">
                            @foreach($authors as $author)
                                <div class="col-md-6">
                                    @includeIf('partials.author_thumbnail')
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                    @endif
                {{--//Categories--}}
                @if($categories->count()>0)
                    <div class="row mb-3">
                        <div class="col-md-12">

                            <div class="row no-gutters justify-content-between">
                                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Kategori <span style="font-size: 14px;" class="badge small badge-info">{{$categories->count()}}</span></h5>

                                <a class="text-muted align-self-center px-3" data-toggle="collapse" href="#collapseKategori">
                                    Fshihe</a>
                            </div>
                            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">



                        </div>
                        <div class="col-md-12 collapse show" id="collapseKategori">
                            <div class="row">
                                @foreach($categories as $category)

                                    <div class="col-md-6">
                                        @includeIf('partials.category_thumbnail')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                {{--//TAGS--}}
                @if($tags->count()>0)
                <div class="row mb-3">
                    <div class="col-md-12">

                        <div class="row no-gutters justify-content-between">
                            <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Etiketime <span style="font-size: 14px;" class="badge small badge-info">{{$tags->count()}}</span></h5>

                            <a class="text-muted align-self-center px-3" data-toggle="collapse" href="#collapseEtiketime">
                                Fshihe</a>
                        </div>
                        <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">



                    </div>

                    <div class="col-md-12 collapse show" id="collapseEtiketime">

                            <table class="table table-bordered table-light table-sm">
                                <thead>
                                <tr>
                                    {{--<th scope="col">#</th>--}}
                                    <th class="w-25" scope="col">Emri</th>

                                    <th class="w-25" scope="col">Nr. i librave</th>
                                    <th class="w-25" scope="col">Shiqo etikietimin</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($tags as $tag)
                                    <tr>

                                        <td>{{$tag->name}}</td>
                                        <td>{{$tag->books()->count()}}</td>
                                        <td><a href="/tag/{{$tag->id}}">Link</a></td>
                                        {{--<td>@mdo</td>--}}
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                    </div>

                </div>@endif
            </div>
        @else
            <div class="col-md-10">
                <div class="d-flex align-items-center justify-content-center" style="min-height: 50vh">
                    <div class="flex-row">


                        <h3 class="text-info font-weight-bold align-middle">Nuk u gjete asgje!</h3>
                    </div>


                </div>
            </div>
        @endif
        <div class="col-md-2 sidebar">
            @includeIf('partials.sidebar')
        </div>

        {{--<div class="col-md-10 pull-left card mb-3" style="">--}}
        {{----}}
        {{--<!-- </div> -->--}}
        {{--</div>--}}

    </div>




@endsection
