@extends('layouts.app')
@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Rezultatet e kerkimit për "'.request('query').'"'])
@endsection

@section('content')



    <div class="row">


        <div class="col-md-10 ">

            <div class="card mb-3">

                <div class="card-body p-3 ">
    @if(@isset($Author))
    @if($Author == 'Ska Rezultate')
    <div class="col-md-10">
                <div class="d-flex align-items-center justify-content-center" style="min-height: 50vh">
                    <div class="flex-row">
                        <h3 class="text-info font-weight-bold align-middle">Nuk u gjete asgje!</h3>
                    </div>


                </div>
            </div>

            @else

    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Emri Mbiemri</th>
        <th>Librat</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      
      <td>
          <?php $i=1;?>
          @foreach($Author as $auth)
          
          {{"$i. $auth->name"}}
           <br>
           @for ($k = 0; $k < $j; $k++)
            <br>
           @endfor
           <br>
          <?php $i+=1;?>
          
          @endforeach

      </td>
      <br>
      <td>
      

          <?php
         
          foreach($Author as $auth){
          $Aut = App\Author::find($auth->id);
          $var = $Aut->books;
          foreach($var as $va){

          echo "$j. $va->title \n";?><br> 
          <?php $j+=1;  }  ?>
           <br>
          <?php  }    ?>
          <br>


      </td>
      </tr>

         
      
    </tbody>
  </table>
  @endif
  @else
 @if($books == 'Ska Rezultate')
 <div class="col-md-10">
                <div class="d-flex align-items-center justify-content-center" style="min-height: 50vh">
                    <div class="flex-row">
                        <h3 class="text-info font-weight-bold align-middle">Nuk u gjete asgje!</h3>
                    </div>


                </div>
            </div>

 @else
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Librat</th>
        <th>Autoret</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <?php $i=1; ?>
          @foreach($books as $book)
          {{"$i. $book->title"}}
           <br>
           <br>
          <?php $i+=1;  ?>
          
          
          @endforeach
      </td>
      <br>
      <td>
      
          <?php

          $j = 1;
          foreach($books as $book){
          $boo = App\Book::find($book->id);
          $var = $boo->authors;
          foreach($var as $va){
          echo "$j. $va->name"; ?><br> <?php
          $j+=1;
           }
           ?>
           <br>
           <?php
          }
          ?>
          <br>
      </td>
      </tr>
         
      
    </tbody>
  </table>

  @endif
  @endif
  </div>
  </div>
  </div>
 <div class="col-md-2 sidebar">
        @includeIf('partials.sidebar')

</div>



</div>




@endsection
