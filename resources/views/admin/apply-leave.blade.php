@extends('admin_layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Applying for Leave</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="input-group mb-3 col-md-8">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="ID number">
                <div class="input-group-prepend">
                    <button class="btn btn-primary" type="button" id="button-addon1">Search</button>
                </div>

            </div>


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Employee Name</th>
                            <th>Position</th>
                            <th>Office/Hospital</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $row)
                            <tr>
                                <td>{{ $row->IDNO }}</td>
                                <td>{{ $row->FINAME . ' ' . $row->MIDNAME . ' ' . $row->SURNAME }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
