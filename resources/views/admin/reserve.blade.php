@extends('admin.layouts.admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Te gjitha Rezervimet e Regjistruara</div>
                <div class="card-body px-0">
                    <table id="myTable" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Emri i Librit</th>
                            <th>Emri i Rezervuesit</th>
                            <th>Data e Aplikimit Per Rezervim</th>
                            <th>Data e Skadimit te Aplikimit</th>
                            <th>Statusi</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Requests as $request)
                            <tr>
                                <td>{{$request->book->title}}</td>
                                <td>{{$request->user->name}}</td>
                                <td>{{$request->req_start}}</td>
                                <td>{{$request->req_end}}</td>
                                
                                <td>{{$request->status}}</td>
                             
                               
                                

                                
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