@extends('admin.layouts.admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Te gjitha librat</div>
                <div class="card-body px-0">
                    <table id="myTable" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulli</th>
                            <th>Autoret</th>
                            <th>ISBN/ISNN</th>
                            <th>Stoku</th>
                            
                            <th>Shtuar nga</th>
                            <th>Veprimi</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($books as $book)
                            <tr>
                                <td>{{$book->id}}</td>
                                <td>{{$book->title}}</td>
                                <td>
                                    @foreach($book->authors as $author)
                                        <a href="author/{{$author->id}}">{{$author->name}} </a>
                                    @endforeach

                                </td>
                                @if(@isset($book->isbns[0]))
                                <td>{{$book->isbns[0]->isbn}}</td>
                                @else
                                <td>ska</td>
                                @endif
                                <td>{{$book->stock}}</td>
                                

                                <td>{{$book->addedBy->name}}</td>
                                
                                <td class="text-center">
                                    <a href="/book/{{$book->id}}/edit" class="btn btn-link px-1"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-link text-danger px-1"><i class="fa fa-remove" aria-hidden="true"></i></a>
                                </td>


                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>


        </div>

    </div>



    <div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div>












@endsection