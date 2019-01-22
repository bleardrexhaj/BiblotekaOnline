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
                            <th>Delete</th>
                            
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
                                

                                
                                
                                <td class="text-center">
                                    
                                    <a href="delete" class="btn btn-link text-danger px-1" data-toggle="modal" data-target="#deleteModal" onclick="changeValue({{$user->id}})"><i class="fa fa-remove" aria-hidden="true"></i></a>
                                </td>


                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>


        </div>

    </div>

            <script type="text/javascript">

                function changeValue(x)
                {
                  // Changes the value of the button
                  document.forma1.button1.value = x;
                } 

            </script>


    <div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    </div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Komfirmo Fshirjen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">
        <form name="forma1" method="POST" action="/user/delete">
        {{csrf_field()}}
          
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">A jeni i Sigurte</label>
            
          </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Jo</button>
        <button type="submit" class="btn btn-primary" onclic="confirmSubmit(event)" name="button1">Po</button>
        <script type="text/javascript">
        
        </script>
        </form>
      </div>
    </div>
  </div>
</div>











@endsection