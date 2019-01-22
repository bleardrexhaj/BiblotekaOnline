@extends('layouts.app')

@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Bibloteka'])
@endsection


  
        

@section('content')
<div class="col-md-12">
            <div class="row no-gutters justify-content-between">
                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Toturiale si te perdorim e-Bibloteken!!</h5>
                <a href="#" class="text-muted"><i class="material-icons" style="vertical-align: top">keyboard_arrow_right</i></a>
            </div>
            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">
</div>


<div class="row">
<div class="col-md-4" style="margin-left:1%;">
<div class="card bookThumbnail mb-3 border-none" >
    <div class="row mx-0">
    
        
        <h6 class="font-weight-bold" style="max-height: 4em; overflow: hidden">Rezervimi i librit dhe aprovimi</h6>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/Q3rUeU--T6k" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>


        
       
</div>

</div>
</div>

<div class="col-md-4">
<div class="card bookThumbnail mb-3 border-none" >
    <div class="row mx-0">
    
        
        <h6 class="font-weight-bold" style="max-height: 4em; overflow: hidden">Regjistrimi i Femijeve</h6>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/kYvvVzgqo4Q" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>


        
       
</div>

</div>


</div>







  
    


    

@endsection

