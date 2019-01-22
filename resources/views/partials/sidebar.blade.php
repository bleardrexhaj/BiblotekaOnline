



<div class="row">
    <h3 class="sidebar-title pr-5">Kategorite</h3>
    <nav class="nav flex-column ">

        @foreach(App\Category::where('parent_id',null)->get() as $category)
            <a class="nav-link nav-item sidebar-item pl-0 pb-1" href="/category/{{$category->id}}">{{$category->name}}</a>

        @endforeach
        {{--<a class="nav-link active" href="#">Active</a>--}}
        {{--<a class="nav-link" href="#">Link</a>--}}
        {{--<a class="nav-link" href="#">Link</a>--}}
        {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
    </nav>

</div>