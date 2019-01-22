<div class="container-fluid bg-white mb-3">
    <div class="row">
    <div class="container mb-2">
        <div class="row justify-content-between">

            <div class="col-md-9">
                <h5 style="font-size: 20px;" class="text-justify mt-1">
                
                        @isset($tittle)
                        {{$tittle}}
                        @endisset

                        @isset($t)
                        
                           @if($t == 'Titulli')

                            {{"me opsionin Title"}}
                           
                           @endif
                        @endisset


                        @isset($t1)
                        
                          @if($t1 == 'Autori')

                            {{"me opsionin Author"}}
                          
                          @endif

                        @endisset
                    
                </h5>
            </div>


            <div class="col-md-3">


                {{--<h3 class="sidebar-title pr-5">Kerko</h3>--}}
                <form class="input-group" action="{{route('search')}}" method="POST">
                    {{ csrf_field()}}
                    <input type="search" class="form-control" name="term" id="term" placeholder="Kerko..." required
                           minlength="3">
                    <button class="input-group-addon" type="submit"><i
                                class="material-icons align-text-bottom">search</i></button>
                    {{--<div class="input-group-addon"><i class="material-icons align-text-bottom">search</i></div>--}}
                </form>
                {{--<div class="">--}}
                {{--<a class="small" href="/browse">Kerkim i avancuar...</a>--}}
                {{--</div>--}}

            </div>
        </div>

    </div>
    </div>

</div>