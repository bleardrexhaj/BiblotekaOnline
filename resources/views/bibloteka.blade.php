@extends('layouts.app')

@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Bibloteka'])
@endsection


  
        

@section('content')
<div class="col-md-12">
            <div class="row no-gutters justify-content-between">
                <h5 class="mb-0 pb-3" style="border-bottom: 1px solid black;">Lokacioni i Biblotekes!!</h5>
                <a href="#" class="text-muted"><i class="material-icons" style="vertical-align: top">keyboard_arrow_right</i></a>
            </div>
            <hr class="" style="margin-top:-1px; border-top: 1px solid lightgray;">
  
    <div id="map"></div>

@endsection

