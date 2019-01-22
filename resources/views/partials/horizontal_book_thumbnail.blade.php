<div class="card bookThumbnail mb-3 border-none" style="height: 85vh">
    <div class="row mx-0">
        <div class="col-md-12" style="min-height:50vh; background-size:cover; background-image: url({{asset('storage/book_covers/'.$th_book->cover_path)}});
                ">
        </div>

        <div class="card-body">

            <h5><a class="link-no-hover" href="/book/{{$th_book->id}}">{{$th_book->title}}</a></h5>

            <p class="small mt-1">
                @foreach($th_book->authors as $author)

                    <a class="text-muted" href="/author/{{$author->id}}">{{$author->name}},</a>
                @endforeach
            </p>


            <p class="text-muted" style="font-size: 13px"><a class="link-no-hover" href="/book/{{$th_book->id}}">{{$th_book->description}}</a></p>

            <div class="row mt-5">

                <div class="col-md-12" style="position:absolute; bottom:0!important">

                    <div class="row px-3">
                        <div class="mr-auto">
                            <p class="text-uppercase small mb-0">
                                @foreach($th_book->categories as $subcategory)
                                    <a class="text-muted" href="/categorys/{{$subcategory->id}}">{{$subcategory->name}},</a>

                                @endforeach


                            </p>
                            <p class=" text-muted small mt-0">Te pranishme: {{$th_book->stock}}</p>
                        </div>
                        @auth
                            @php
                                $status = Auth::user()->savedBooks()->where('book_id',$th_book->id)->exists();
                            @endphp

                            <a
                                    id="bookMarkButton{{$th_book->id}}" onclick="saveBook('{{$th_book->id}}','{{csrf_token()}}');"
                                    class="bookMarkButton  {{$status ? 'text-primary' : 'text-secondary' }}">
                                    <span style="font-size: 32px;" class="oi oi-bookmark"></span>

                            </a>
                        @endauth
                        @guest
                            <a
                                    id="bookMarkButton{{$th_book->id}}"
                                    data-toggle="modal" data-target="#loginModal"
                                    class="bookMarkButton">
                                    <span style="font-size: 32px;" class="oi oi-bookmark"></span>
                            </a>
                        @endguest
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>