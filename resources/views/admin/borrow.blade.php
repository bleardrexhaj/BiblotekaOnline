@extends('admin.layouts.admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Te gjitha Huazimet</div>
                <div class="card-body px-0">
                    <table id="myTable" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Emri i Librit</th>
                            <th>Emri i Rezervuesit</th>
                            <th>Data e Rezervimit</th>
                            <th>Data e Skadimit</th>
                            <th>Statusi</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($borrows as $borrow)
                            <tr>
                                <td>{{$borrow->request->book->title}}</td>
                                <td>{{$borrow->request->user->name}}</td>
                                <td>{{$borrow->borrow_start}}</td>
                                <td>{{$borrow->borrow_end}}</td>
                                
                                <td>{{$borrow->status}}</td>
                             
                               
                                

                                
                                <!--
                                <td class="text-center">
                                    <a href="#" class="btn btn-link px-1"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-link text-danger px-1"><i class="fa fa-remove" aria-hidden="true"></i></a>
                                </td>
                                 -->

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