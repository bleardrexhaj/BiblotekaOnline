@extends('admin.layouts.admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Te gjitha Kategorite</div>
                <div class="card-body px-0">
                    <table id="myTable" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Udc Kodi</th>
                            <th>Emri i Kategorise</th>
                            <th>Kategoria Prind</th>
                            <th>Ndrysho Kategorine</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->udc_code}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{\App\Category::find($cat->parent_id)['name']}}</td>
                                <td class="text-center" style="width:10%">
                                    <a href="/category/{{$cat->id}}/edit" class="btn btn-link px-1"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    
                                </td>
                                
                            
                                

                                
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