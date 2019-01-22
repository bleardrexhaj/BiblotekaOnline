@extends('layouts.app')
@section('page-header')
    @includeIf('partials.page-title_search',['tittle'=>'Shfleto'])
@endsection
@section('content')

    <div class="row">


        <div class="col-md-10 ">

            <div class="card mb-3">

                <div class="card-body p-3 ">
                    


                    <form method="POST" action="{{ route('result') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-12">
                                    {{--<label for="pid" class="small control-label">ID:</label>--}}


                                    <input id="query" placeholder="Kero sipas Titullit, Autorit..." type="text"
                                           class="form-control {{ $errors->has('query') ? ' is-invalid' : '' }}"
                                           name="query" value="{{ old('query') }}" required autofocus>

                                    @if ($errors->has('query'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('query') }}</strong>
                                        </div>
                                    @endif

                                </div>

                

                                    @if ($errors->has('category'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    

                
                     <div class="radio">

                     <div class="form-check form-check-inline">
                     <br>
                     <div class="radio-1">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptions" value="Title">
                     <label class="form-check-label" for="inlineRadio1">Title</label>
                     </div>
                     <br>
                     <div class="radio-2">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptions1" value="Autor">
                     <label class="form-check-label" for="inlineRadio2">Author</label>
                     </div>
                     <br>
                     <div class="buttonisubmit">
                     <button type="submit" class="btn btn-primary" style="display:none;">Kerko</button>
                     </div>
                     </div>
                      </form>

                    

               </div>
                
            </div>


        <div class="card p-3 mb-3">

            <div class="card-body p-0">

                <h4 class="mb-3">Me shume nga kategoritie: </h4>
                <hr class="ml-0 pl-0">


                <div class="row">


                </div>


            </div>
        </div>



        </div>
    <div class="col-md-2 sidebar">
        @includeIf('partials.sidebar')

    </div>

    {{--<div class="col-md-10 pull-left card mb-3" style="">--}}
    {{----}}
    {{--<!-- </div> -->--}}
    {{--</div>--}}

    </div>


@endsection
