@extends('admin.layouts.admin_layout')

@section('content')
        <div class="card mb-3">
            <div class="card-header">
                Zgjidh nga rezervimet
            </div>
            <div class="card-body">
                <form action="/borrow" method="POST">
                    {{csrf_field()}}
                    {{--<div class="form-group row">--}}
                        {{--<label for="subject" class="col-sm-2 col-form-label">Titulli</label>--}}
                        {{--<div class="col-sm-10">--}}
                            {{--<input type="text" class="form-control"--}}
                                   {{--name="subject"--}}
                                   {{--id="subject" placeholder="Subjekti/Titulli i takimit">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                        {{--<label for="descriptionTextArea" class="col-sm-2 col-form-label">Pershkrimi</label>--}}
                        {{--<div class="col-sm-10">--}}

                                    {{--<textarea name="description" rows="5" class="form-control" id="descriptionTextArea"--}}
                                              {{--placeholder="Rendi i dites/detaje te takimit">--}}
                                    {{--</textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                        {{--<label for="time" class="col-sm-2 col-form-label">Koha</label>--}}
                        {{--<div class="col-sm-10">--}}
                            {{--<input type="datetime-local" class="form-control"--}}
                                   {{--name="time"--}}
                                   {{--id="time" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                        {{--<label for="place" class="col-sm-2 col-form-label">Vendi</label>--}}
                        {{--<div class="col-sm-10">--}}
                            {{--<input type="text" class="form-control"--}}
                                   {{--name="place"--}}
                                   {{--id="place" placeholder="Vendi i takimit" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="request_id">Zgjidh rezervimin</label>
                            <select id="request_id" name="request_id" class="form-control">
                                <option value="0">Zgjidh njerin nga rezervimet</option>

                                @foreach($bookRequests as $request)
                                @if($request->borrow != null)

                                @else
                                    <option value="{{$request->id}}"><span>{{$request->user->name}}</span> - <span>{{$request->book->title}}</span></option>
                                @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-6">

                            {{--Data e kthimit--}}
                            <label for="borrow_end">Data e kthimit</label>

                            <select id="borrow_end" name="borrow_end" class="form-control" required>

                                <option value="{{$time = Carbon\Carbon::today()->addDay()->toDateString()}}">Pas 1 dite - {{$time}}</option>
                                <option value="{{$time = Carbon\Carbon::today()->addWeek()->toDateString()}}">Pas 1 jave - {{$time}}</option>
                                <option value="{{$time = Carbon\Carbon::today()->addWeek(2)->toDateString()}}">Pas 2 jave - {{$time}}</option>
                                <option value="{{$time = Carbon\Carbon::today()->addMonth()->toDateString()}}">Pas 1 muaji - {{$time}}</option>


                            </select>

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <button type="submit" onclick="confirmSubmit(event)" class="btn btn-outline-primary pull-right w-25">Huazo</button>

                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Huazim pa rezervim paraprak
            </div>
            <div class="card-body">
                <form action="/borrow" method="POST">
                    {{csrf_field()}}


                    <input type="hidden" name="borrow_type" value="no_request">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_id">Perdoruesi</label>
                            <select id="user_id" name="user_id" class="form-control form-control-chosen">
                                <option value="-1">Zgjidh antarin</option>
                                <?php $users = \App\User::all(); ?>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}"><span>{{$user->name}}</span> - <span>{{$user->pid}}</span></option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-6">


                            <label for="book_id">Libri</label>

                            <select id="book_id" name="book_id" class="form-control form-control-chosen">
                                <option value="-1">Zgjidh librin</option>
                                <?php $books = \App\Book::all(); ?>
                                @foreach($books as $book)
                                    <option value="{{$book->id}}"><span>{{$book->title}}</span> - <span>{{$book->author}}</span></option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">

                            {{--Data e kthimit--}}
                            <label for="borrow_end">Data e kthimit</label>

                            {{--<input type="date" class="form-control" name="borrow_end" id="borrow_end" required>--}}
                            <select id="borrow_end" name="borrow_end" class="form-control" required>

                                    <option value="{{$time = Carbon\Carbon::today()->addDay()->toDateString()}}">Pas 1 dite - {{$time}}</option>
                                    <option value="{{$time = Carbon\Carbon::today()->addWeek()->toDateString()}}">Pas 1 jave - {{$time}}</option>
                                    <option value="{{$time = Carbon\Carbon::today()->addWeek(2)->toDateString()}}">Pas 2 jave - {{$time}}</option>
                                    <option value="{{$time = Carbon\Carbon::today()->addMonth()->toDateString()}}">Pas 1 muaji - {{$time}}</option>


                            </select>

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <button type="submit" onclick="confirmSubmit(event)" class="btn btn-outline-primary pull-right w-25">Huazo</button>

                        </div>

                    </div>
                </form>
            </div>
        </div>














@endsection