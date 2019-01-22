@extends('admin.layouts.admin_layout')

@section('content')


    <div class="row">
        {{--Rezervimet--}}
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-clock-o"></i>
                    </div>
                    <div class="mr-5">
                    
                    @if (($bookRequests->count() - $bookBorrows->count())>=0)
                    {{$bookRequests->count() - $bookBorrows->count()}} 
                    @else 
                    {{0}}
                    @endif 
                    
                    Kerkesa Per Rezervim Sot
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Me shume</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        {{--Kthimet--}}
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-undo"></i>
                    </div>
                    <div class="mr-5">{{$bookBorrows->count()}} Rezervime Te Aprovuara</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Me shume</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        {{--Perdoruesit e rinje--}}
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-users"></i>
                    </div>
                     <?php $a=0; ?>
                    @foreach($bookBorrows as $request)
                    @if($request->status == "returned")
                    @php $a+=1; @endphp
                    @endif
                    @endforeach
                    <div class="mr-5">{{$a}} Kthime</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Me shume</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>


    </div>


    <div class="row">

        <div class="col-md-12">
        
            <div class="card mb-3">
                <div class="card-header">Kerkesat</div>
                <div class="card-body px-0">
                    <table id="myTable" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Libri</th>
                            <th>Antari</th>
                            <th style="width:15%; text-align:center">Veprimi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookRequests as $request)
                        @if($request->borrow != null)

                        @else
                            <tr>
                                <td>{{$request->book->title}}</td>
                                <td>{{$request->user->name}}</td>
                                <td style="width:15%; text-align:center">
                                    <!--<input type="hidden" name="request_id" value="{{ $request->id }}" />-->

                                    <a href="#"  onClick="return validate()" class="btn btn-outline-secondary btn-sm" data-toggle="modal" @if($request->status == 'expired')  @else data-target="#AproveRequestModal{{$request->id}}" @endif>@if($request->status == 'expired') Nuk Lejohet @else Lejo @endif</a>
                                    
                                </td>

                            </tr>
                        
                        @endif
                        @endforeach

                        </tbody>
                      
                    </table>
                </div>
            </div>
            
           
            <div class="card mb-3">
                <div class="card-header">Rezervimet</div>
                <div class="card-body px-0">
                    <table id="myTable" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Libri</th>
                            <th>Antari</th>
                            <th style="width:15%; text-align:center">Veprimi</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookBorrows as $request)
                        @if($request->status == 'returned')

                        @else
                            <tr>
                                <td>{{$request->request->book->title}}</td>
                                <td>{{$request->request->user->name}}</td>
                                <td style="width:15%; text-align:center">
                                    <a href="return" class="btn btn-outline-primary btn-sm">Vepro</a>
                                </td>

                            </tr>
                            @endif
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            
            <div class="card mb-3">
                <div class="card-header">Kthimet</div>
                <div class="card-body px-0">
                    <table id="myTable" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Libri</th>
                            <th>Antari</th>
                            <th style="width:25%; text-align:center">Data e Kthimit</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookBorrows as $request)
                        @if($request->status == "returned")

                        
                            <tr>
                                <td>{{$request->request->book->title}}</td>
                                <td>{{$request->request->user->name}}</td>
                                <td style="width:25%; text-align:center">
                                    {{$request->borrow_end}}
                                </td>

                            </tr>
                            @endif
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

    </div>


    @foreach($bookRequests as $request)
    <div class="modal fade" id="AproveRequestModal{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Aprovo Kerkesen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/borrow" onsubmit="return checkForm(this);">
        {{csrf_field()}}
          <input type="hidden" id="request_id" name="request_id" value="{{ $request->id }}" />
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Cakto Daten e Kthimit:</label>
            <select id="borrow_end" name="borrow_end" class="form-control" required>

                <option value="{{$time = Carbon\Carbon::today()->addDay()->toDateString()}}">Pas 1 dite - {{$time}}</option>
                <option value="{{$time = Carbon\Carbon::today()->addWeek()->toDateString()}}">Pas 1 jave - {{$time}}</option>
                <option value="{{$time = Carbon\Carbon::today()->addWeek(2)->toDateString()}}">Pas 2 jave - {{$time}}</option>
                <option value="{{$time = Carbon\Carbon::today()->addMonth()->toDateString()}}">Pas 1 muaji - {{$time}}</option>

            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclic="" id="submit_btn">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach


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