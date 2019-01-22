@extends('layouts.app')

@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Ballina'])
@endsection

@section('content')

    <div class="row mt-5 mb-3">

        <div class="col-md-12">
            <div class="row no-gutters justify-content-between">
                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Te rekomanduara</h5>
                <a href="#" class="text-muted">Me shume<i class="material-icons" style="vertical-align: top">keyboard_arrow_right</i></a>
            </div>
            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">

        </div>
        @php $a=0; @endphp
        @foreach($books as $th_book)
        
        <div class="col-md-6">
         
            @includeIf('partials.vertical_book_thumbnail',['th_book'=>$books[$a]])
         
         
        </div>
        @php $a+=1; @endphp
        @endforeach
        



    </div>

    <div class="row mb-3 p-3" style="min-height: 60vh; color: white;">


        @includeIf('partials.gradient_card',[
        'gradientClass'=>'gradient',
        'header'=>'Libra per femije, nen moshen 15 vjeqare.',
        'subHeader' =>'',
        'linkTo'=>'category/'.$Kids->id.''
        ])


    </div>

    <div class="row mb-3">

        <div class="col-md-12">
            <div class="row no-gutters justify-content-between">
                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;"></h5>
                <a href="category/{{$Kids->id}}" class="text-muted">Me shume<i class="material-icons" style="vertical-align: top">keyboard_arrow_right</i></a>
            </div>
            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">

        </div>

        @if($Kids->books != null)
        @php $a=0; @endphp
        @foreach($Kids->books as $th_book)
        
        <div class="col-md-6">
         
            @includeIf('partials.vertical_book_thumbnail',['th_book'=>$Kids[$a]])
         
         
        </div>
        @php $a+=1; @endphp
        @endforeach
        @endif

        
        
        @foreach($Kids->childCategories as $kc)
        
        @foreach ($kc->books as $book) 
        @if($book != null)
        <div class="col-md-6">
         
            @includeIf('partials.vertical_book_thumbnail',['th_book'=>$book])
         
         
        </div>
        @endif
        @endforeach
        
        @endforeach
        

        


    </div>

    <div class="row mb-3 p-3" style="min-height: 60vh; color: white;">


        @includeIf('partials.gradient_card',[
        'gradientClass'=>'gradient3',
        'header'=>'Libra nga shkenca dhe teknologjia, per student.',
        'subHeader' =>'Libra nga fusha e shkences dhe teklonogjise per student dhe femije gjithqka qe ka te beje me kompjuterat.',
        'linkTo'=>'category/'.$CAT->id.''
        ])


    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="row no-gutters justify-content-between">
                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Te rekomanduara</h5>
                <a href="category/{{$CAT->id}}" class="text-muted">Me shume<i class="material-icons" style="vertical-align: top">keyboard_arrow_right</i></a>
            </div>
            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">

        </div>


            
            @foreach ($CAT->books as $ca) 
     
            <div class="col-md-6">
            
              
            

            
            @includeIf('partials.vertical_book_thumbnail',['th_book'=>$ca])


            
            

            </div>
            @endforeach




        @foreach($CAT->childCategories as $kc)
        
        @foreach ($kc->books as $book) 
        @if($book != null)
        <div class="col-md-6">
         
            @includeIf('partials.vertical_book_thumbnail',['th_book'=>$book])
         
         
        </div>
        @endif
        @endforeach
        
        @endforeach
           

        <!-- <div class="col-md-8">
            <div class="row">


                    <div class="col-md-4">

                        @includeIf('partials.book_thumbnail',['th_book'=>$books[1]])


                    </div>
                    <div class="col-md-4">
                        @includeIf('partials.book_thumbnail',['th_book'=>$books[0]])

                    </div>
                    <div class="col-md-4">
                        @includeIf('partials.book_thumbnail',['th_book'=>$books[0]])

                    </div>
            </div>
            <div class="row">
                    <div class="col-md-4">

                        @includeIf('partials.book_thumbnail',['th_book'=>$books[2]])


                    </div>
                    <div class="col-md-4">
                        @includeIf('partials.book_thumbnail',['th_book'=>$books[1]])

                    </div>
                    <div class="col-md-4">
                        @includeIf('partials.book_thumbnail',['th_book'=>$books[1]])

                    </div>
            </div>



        </div> -->





    </div>


    <div class="row mb-3">
        <div class="col-md-12">
            <nav class="nav justify-content-between ">

                @foreach(App\Category::all() as $category)
                    <a class="nav-link nav-item text-uppercase text-muted small" href="/category/{{$category->id}}">{{$category->name}}</a>
                @endforeach

            </nav>
        </div>


    </div>



@endsection
