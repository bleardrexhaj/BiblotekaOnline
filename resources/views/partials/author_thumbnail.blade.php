<div class="card mb-3 border-none" style="height: 20vh">
    <div class="row mx-0">
        <div class="card-body">

            <h6 class="font-weight-bold text-capitalize"><a class="link-hover" href="/author/{{$author->id}}">{{$author->name}}</a></h6>

            {{--<p class="small mt-1">--}}
            {{--<a class="text-muted" href="/subcategory/{{$subcategory->id}}">{{$subcategory->description}}</a>--}}
            {{--</p>--}}


            <p class="text-muted" style="font-size: 0.85em"><a class="link-no-hover" href="/subcategory/{{$author->id}}">{{$author->bio}}</a></p>
            <div class="m-3" style="position: absolute; bottom: 0; right: 0;">
                <span  class="text-muted small"># i librave:</span>
                <span class="badge badge-info">{{$author->numberOfBooks}}</span>
            </div>
            <div class="row mt-5">

                <div class="col-md-12" style="position:absolute; bottom:0!important">

                    <div class="row px-3">

                        {{--<p class="text-muted small">Kategoria prind:--}}

                            {{--<a class="text-uppercase text-muted" href="/category/{{$subcategory->category->id}}"> {{$subcategory->category->name}}</a>--}}
                        {{--</p>--}}
                        {{--<p class=" text-muted small mt-0"># Librave: {{$subcategory->numberOfBooks}}</p>--}}

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>