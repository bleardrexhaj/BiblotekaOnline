

<nav aria-label="breadcrumb " role="navigation">
    <ol class="breadcrumb py-0 pl-0" style="background: none!important;">
        <li class="breadcrumb-item text-uppercase small"><a href="/category">Kategorite</a></li>

        @foreach($category->upperTrail as $categ)

                <li class="breadcrumb-item text-uppercase small"><a href="/category/{{$categ->id}}">{{$categ->name}}</a></li>

        @endforeach
        <li class="breadcrumb-item active text-uppercase small" aria-current="page">{{$category->name}}</li>


        {{--<li class="breadcrumb-item"><a href="#">Library</a></li>--}}
        {{--<li class="breadcrumb-item active" aria-current="page">Data</li>--}}
    </ol>
</nav>

