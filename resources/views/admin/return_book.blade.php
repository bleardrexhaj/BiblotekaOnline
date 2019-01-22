@extends('admin.layouts.admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Librat e pakthyer</div>
                <div class="card-body px-0">
                    <table id="myTable" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Libri</th>
                            <th>Antari</th>
                            <th>Data e kthimit</th>
                            <th>Veprimi</th>


                        </tr>
                        </thead>
                        <tbody>

                        @foreach($activeBorrows as $borrow)
                            <tr>
                                <td>{{$borrow->request->book->title}}</td>
                                <td>{{$borrow->request->user->name}}</td>
                                <td>{{Carbon\Carbon::parse($borrow->borrow_end)->toDateString()}}</td>
                                <td>
                                    <form action="/return/{{$borrow->id}}" method="POST">
                                        {{method_field('PUT')}}
                                        {{csrf_field()}}
                                        <input type="hidden" name ="status" value="expired">
                                        <button type="submit" onclick="confirmSubmit(event)"
                                                class="btn btn-sm btn-primary w-100"

                                        >Kthe</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>


        </div>

    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Konfirmo kthimin e librit!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kthehu</button>
                    <button onclick="confirmSubmit()" type="button" class="btn btn-primary">Ruaj</button>
                </div>
            </div>
        </div>
    </div>
















@endsection