@extends('admin.layouts.admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Te gjith Userat</div>
                <div class="card-body px-0">
                    <table id="myTable" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Pid</th>
                            <th>Emri Mbiemri</th>
                            <th>Data e lindjes</th>
                            <th>Adresa</th>
                            <th>email</th>
                            <th>Numri i Telefonit</th>
                            <th>Tipi i Userit</th>
                            
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->pid}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->dob}}</td>
                                <td>{{$user->address}}</td>
                                
                                <td>{{$user->email}}</td>
                             
                                <td>{{$user->phone}}</td>
                               
                                <td>{{$user->user_type}}</td>
                                

                                
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