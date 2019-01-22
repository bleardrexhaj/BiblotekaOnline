@extends('admin.layouts.admin_layout')

@section('content')


    <div class="card mb-3">
        <div class="card-header">
            Shto liber te ri 
        </div>
        <div class="card-body px-5">
            <form action="/book" method="POST">
                {{csrf_field()}}

                <div class="form-row">
                    <label for="title" class="col-sm-3 col-form-label">Titulli</label>
                    <div class="form-group col-md-8">
                        <input type="text" name="title" class="form-control" id="title" required>

                    </div>
                </div>

                {{--Autoret dhe kategorite--}}
                <div class="form-row">
                    <label for="authors" class="col-sm-3 col-form-label">Zgjidh autoret</label>
                    <div class="form-group col-md-8">
                        <select id="authors" name="authors[]" class="form-control form-control-chosen" data-placeholder="Zgjidh autoret" multiple>
                            <option value="-1">Zgjidh autoret</option>
                            @foreach(\App\Author::all() as $author)
                                <option value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <a href="#AddAuthorModal" class="btn btn-link" id="addAuthor" data-toggle="modal" data-target="#AddAuthorModal"><i class="fa fa-plus-circle"></i></a>


                    </div>

                </div>
                <div class="form-row">
                    <label for="categories" class="col-sm-3 col-form-label">Zgjidh kategorite</label>
                    <div class="form-group col-md-8">

                        <select id="categories" name="categories[]" class="form-control form-control-chosen" data-placeholder="Zgjidh kategorite" multiple>
                            <option value="-1">Zgjidh kategorite</option>
                            @foreach(\App\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->udc_code}} - {{$category->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-1">
                        <a href="#AddCategoryModal" class="btn btn-link" id="addCategory" data-toggle="modal" data-target="#AddCategoryModal"><i class="fa fa-plus-circle"></i></a>


                    </div>
                </div>

                <div class="form-row">
                    <label for="stock" class="col-sm-3 col-form-label">Stoku</label>
                    <div class="form-group col-md-8">

                        <input type="number" name="stock" class="form-control" id="stock" required>

                    </div>


                </div>

                <div class="form-row">
                    <label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
                    <div class="form-group col-md-5">

                        <input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN">

                    </div>

                </div>
                <div class="form-row">
                    <label for="issn" class="col-sm-3 col-form-label">ISSN</label>

                    <div class="form-group col-md-5">

                        <input type="text" name="issn" class="form-control" id="issn" placeholder="ISSN">

                    </div>

                </div>



                <div class="form-row">
                    <label for="pub_year" class="col-sm-3 col-form-label">Viti i publikimit</label>
                    <div class="form-group col-md-5">

                        <input type="text" name="pub_year" class="form-control" id="pub_year" required>

                    </div>

                </div>


                <div class="form-row">

                    <label for="publisher" class="col-sm-3 col-form-label">Shtepia Botuese</label>
                    <div class="form-group col-md-8">

                        <select id="publisher" name="publisher" class="form-control form-control-chosen">
                            <option value="-1">Zgjidh shtepine botuese</option>
                            @foreach(\App\Publisher::all() as $publisher)
                                <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-1">
                        <a href="#AddPublisherModal" class="btn btn-link" id="addPublisher" data-toggle="modal" data-target="#AddPublisherModal"><i class="fa fa-plus-circle"></i></a>


                    </div>
                </div>

                <div class="form-row">

                    <label for="language" class="col-sm-3 col-form-label">Gjuha</label>
                    <div class="form-group col-md-8">

                        <select id="language" name="language" class="form-control form-control-chosen">
                            <option value="-1">Zgjedh gjuhen</option>
                            @foreach(\App\Language::all() as $language)
                                <option value="{{$language->id}}">{{$language->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-1">
                        <a href="#AddAuthorModal" class="btn btn-link" id="addAuthor" data-toggle="modal" data-target="#AddLanguageModal"><i class="fa fa-plus-circle"></i></a>


                    </div>
                </div>

                <div class="form-row">
                    <label for="properties" class="col-sm-3 col-form-label">Vetite Fizike</label>

                    <div class="form-group col-md-8">
                        <input type="text" name="properties" class="form-control" id="properties">


                    </div>
                </div>





                <div class="form-row">
                    <label for="description" class="col-sm-3 col-form-label">Pershkrimi</label>

                    <div class="form-group col-md-8">
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>

                    </div>
                </div>



                <div class="form-row">
                    <label for="cover_photo" class="col-sm-3 col-form-label">Foto e kopertines</label>

                    <div class="form-group col-md-8">
                        <div class="form-control">
                        <input type="file" class="form-control-file" id="cover_photo" name="cover_photo" accept="image/*" onchange="showImage(this);">
                        <img id="blah" class="img-thumbnail my-3" src="#" alt="Foto e kopertines" />
                        </div>

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

 <!-- Category Modal -->
  <div class="modal fade" id="AddCategoryModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Shto Kategorine e Librit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/category" onsubmit="return checkForm(this);">
        {{csrf_field()}}
        <div class="form-group">
            <label for="recipient-name" class="form-control-label">Udc Code</label>
            <input type="text" class="form-control" id="recipient-name" name="udc_code">
          </div>
        <div class="form-group">
            <label for="recipient-name" class="form-control-label">Kategoria Prind</label>
            <select id="language" name="parent_id" class="form-control form-control-chosen">
                            <option value="-1">Zgjedh Kategorine Prind</option>
                            <option value="-2">Ska Kategori Prind</option>
                            @foreach(\App\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Emri i Kategorise</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Pershkrimi:</label>
            <input type="text" class="form-control" id="recipient-name" name="info">
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

       <!--Publisher Modal-->


    <div class="modal fade" id="AddPublisherModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Shto Autorin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/publisher" onsubmit="return checkForm(this);">
        {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Emri i Shtepise Botuese:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Info:</label>
            <input type="text" class="form-control" id="recipient-name" name="info">
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


<!--Language Modal-->


    <div class="modal fade" id="AddLanguageModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Shto Autorin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/language" onsubmit="return checkForm(this);">
        {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Emri i Gjuhes:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
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




    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<h4>Kthimet</h4>--}}

    {{--<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th scope="col">#</th>--}}
    {{--<th scope="col">Libri</th>--}}
    {{--<th scope="col">Data e rezervimit</th>--}}
    {{--<th scope="col">Statusi</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody id="row_container">--}}
    {{--@foreach($bookRequests as $request)--}}

    {{--<tr id="request_table_row" data-booktitle="{{$request->book->title}} " data-requestdate="{{$request->req_start}}" data-status="{{$request->status}}" >--}}
    {{--<th scope="row"></th>--}}
    {{--<td>{{$request->book->title}}</td>--}}
    {{--<td>{{$request->req_start}}</td>--}}
    {{--<td>{{$request->status}}</td>--}}
    {{--</tr>--}}


    {{--@endforeach--}}
    {{--</tbody>--}}
    {{--</table>--}}




    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row mt-3">--}}
    {{--<div class="col-md-12">--}}
    {{--<h4>Rezervimet</h4>--}}
    {{--</div>--}}

    {{--</div>--}}


    {{--<div class="row mt-3">--}}
    {{--<div class="col-md-12">--}}
    {{--<h4>Perdoruesit e rinje</h4>--}}
    {{--</div>--}}
    {{--</div>--}}




@endsection