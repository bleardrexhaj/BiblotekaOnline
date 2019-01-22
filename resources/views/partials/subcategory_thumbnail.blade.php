<div class="card mb-3 border-none"  style="height: 32vh">
    <div class="row mx-0">
        <div class="card-body">

            <h6 id="title" class="font-weight-bold text-capitalize"><a class="link-hover" href="/category/{{$subcategory->id}}">{{$subcategory->name}}</a></h6>

            {{--<p class="small mt-1">--}}
                    {{--<a class="text-muted" href="/subcategory/{{$subcategory->id}}">{{$subcategory->description}}</a>--}}
            {{--</p>--}}


            <p class="text-dark" style="font-size: 0.85em"><a class="link-no-hover" href="/category/{{$subcategory->id}}">{{$subcategory->description}}</a></p>
            <div class="m-3" style="position: absolute; bottom: 0; right: 0;">
                <span  class="text-muted small">Numri i librave:</span>
                <span class="text-dark small">{{$subcategory->numberOfBooks}}</span>
            </div>
            <div class="row mt-5">

                <div class="col-md-12" style="position:absolute; bottom:0!important">

                    <div class="row px-3">
                            @isset($subcategory->parentCategory)
                            <p class="text-muted small">Kategoria prind:

                                    <a class="text-uppercase text-muted" href="/category/{{$subcategory->parentCategory->id}}"> {{$subcategory->parentCategory->name}}</a>
                            </p>
                            {{--<p class=" text-muted small mt-0"># Librave: {{$subcategory->numberOfBooks}}</p>--}}
                            @endisset
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>