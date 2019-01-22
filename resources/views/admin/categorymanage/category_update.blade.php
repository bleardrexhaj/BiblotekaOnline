@extends('admin.layouts.admin_layout')

@section('content')


    <div class="card mb-3">
        <div class="card-header">
            Ndryshe te dhenat e Kategorise "{{$Category->name}}"
        </div>
        <div class="card-body px-5">
            <form action="/category/{{$Category->id}}" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}



                <div class="form-row">
                    <label for="udc_code" class="col-sm-3 col-form-label">Udc Code</label>
                    <div class="form-group col-md-8">

                        <input type="number" value="{{$Category->udc_code}}" name="udc_code" class="form-control" id="udc_code" required>

                    </div>


                </div>

                <div class="form-row">
                    <label for="name" class="col-sm-3 col-form-label">Emri</label>
                    <div class="form-group col-md-8">
                        <input type="text" value="{{$Category->name}}" name="name" class="form-control" id="name" required>

                    </div>
                </div>

                
                


                <div class="form-row">
                    <label for="description" class="col-sm-3 col-form-label">Pershkrimi</label>
                    <div class="form-group col-md-8">

                        <input type="text" value="{{$Category->description}}" name="description" class="form-control" id="description" required>

                    </div>


                </div>


               


                <div class="form-row">
                    <label for="parent_id" class="col-sm-3 col-form-label">Kategoria Prind</label>

                    <div class="form-group col-md-8">
                       
                        <select id="parent_id" name="parent_id" class="form-control form-control-chosen" data-placeholder="Zgjidh Kategorine Prind" selected>
                        <option value="-1">Ska Kategori Prind</option>
                            @foreach(\App\Category::all() as $cat)
                            <option  @if($Category->parent_id == $cat->id) selected @endif value="{{$cat->id}}">{{$cat->name}} </option>
                            @endforeach
                        </select>


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

     
 








@endsection


