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
                            <th>Shlyej Kategorine</th>
                            
                            
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
                                    <a href="delete" class="btn btn-link text-danger px-1" data-toggle="modal" data-target="#deleteModal" onclick="changeValue({{$cat->id}})"><i class="fa fa-remove" aria-hidden="true"></i></a>
                                    
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



    

    

<script type="text/javascript">

                function changeValue(x)
                {
                  // Changes the value of the button
                  document.forma1.button1.value = x;
                } 

            </script>


    
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
        <form name="forma1" method="POST" action="/category/delete">
        {{csrf_field()}}
          
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">A jeni i Sigurte qe do te fshini kategorine bashk me te gjitha nenKategorite!!</label>
            
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