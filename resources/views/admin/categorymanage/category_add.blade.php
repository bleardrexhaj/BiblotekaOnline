@extends('admin.layouts.admin_layout')

@section('content')


    <div class="card mb-3">
        <div class="card-header">
            Shto Kategorine e Re
        </div>
        <div class="card-body px-5">
            <form action="/category" method="POST">
                {{csrf_field()}}

                <div class="form-row">
                    <label for="recipient-name" class="col-sm-3 col-form-label">Udc Code: </label>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control" id="recipient-name" name="udc_code">
                    </div>
                </div>

                {{--Autoret dhe kategorite--}}
                <div class="form-row">
                    <label for="recipient-name" class="col-sm-3 col-form-label">Kategoria Prind: </label>
                    <div class="form-group col-md-8">
                        <select id="language" name="parent_id" class="form-control form-control-chosen">
                            <option value="-1">Zgjedh Kategorine Prind</option>
                            <option value="-2">Ska Kategori Prind</option>
                            @foreach(\App\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="form-row">
                    <label for="recipient-name" class="col-sm-3 col-form-label">Emri i Kategorise: </label>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control" id="recipient-name" name="name">
                    </div>
                    </div>

                    <div class="form-row">
                    <label for="recipient-name" class="col-sm-3 col-form-label">Pershkrimi: </label>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control" id="recipient-name" name="info">
                    </div>
                    </div>
                    


                <div class="form-row mt-5">
                    <div class="offset-3 col-md-8">
                        <button type="submit" onclick="confirmSubmit(event)" class="btn btn-outline-primary pull-right w-100">Ruaj</button>

                    </div>

                </div>
            </form>
       
    </div>
    </div>
       

       <!--Author Modal-->

   <div class="modal fade" id="AddAuthorModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Shto Autorin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/author" onsubmit="return checkForm(this);">
        {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Emri i Autorit:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Bio:</label>
            <input type="text" class="form-control" id="recipient-name" name="bio">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submit_btn">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>




    




@endsection