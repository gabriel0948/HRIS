@extends('admin_layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Attendance Management</h1>
    </div>


    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            {{-- <div class="col-md-8">
                <label class="text-black font-weight-bold">Search type:</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="customRadioInline" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">ID Number</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="customRadioInline" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">Employee Name (Ex: Juan Dela Cruz)</label>
                </div>
            </div>
 --}}
            <form action={{ route('search_emp') }} method="GET">
                <div class="input-group mb-3 col-md-8">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"
                                aria-hidden="true"></i></span>
                    </div>

                    <input type="text" class="form-control" name="search_txt" placeholder="ID number" autocomplete="off">

                    <div class="input-group-prepend">
                        <button class="btn btn-primary" type="submit" id="button-addon1">Search</button>
                    </div>

                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Employee Name</th>
                            {{-- <th>Position</th> --}}
                            <th>Office/Hospital</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($employee))

                            @if (count($employee) > 0)
                                @foreach ($employee as $row)
                                    <tr>
                                        <td>{{ $row->IDNO }}</td>
                                        <td>{{ $row->FINAME . ' ' . $row->SURNAME }}</td>
                                        {{-- <td>Admin/Aide Software Developer</td> --}}
                                        <td>{{ $row->offdesc }}</td>
                                        <td>
                                            {{-- <button type="button" class="btn btn-info btn_leave" data-toggle="modal"
                                                data-target="#leaveModal" data-id="{{ $row->unique }}">Select</button> --}}
                                            {{-- <a href="{{ route('calendar-leave') }}" type="button" class="btn btn-success">SELECT</a> --}}
                                            <form action="{{ route('calendar-leave') }}" method="GET">
                                                <input type="hidden" name="emp_id" value="{{ $row->unique }}">
                                                <button type="submit" class="btn btn-primary">Select</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12">No Data Found</td>
                                </tr>
                            @endif
                        @endif

                    </tbody>
                </table>
            </div>






        </div>
    </div>

    {{-- 
    <form action="{{ route('calendar-leave') }}" method="GET">
        <input type="text" name="emp_id">
        <button type="submit">click</button>
    </form> --}}




    <!-- Modal -->
    <div class="modal fade" id="leaveModals" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h4 id="modalTitle" class="text-primary font-weight-bold">Attendance</h4>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('leaveStore') }}" method="POST">

                    {{ csrf_field() }}
                    <div id="modalBody" class="modal-body">
                        <div class="container-fluid">
                            <div class="row">

                                {{-- left --}}
                                <div class="col-8 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>

                                {{-- right --}}
                                <div class="col-4 col-sm-6">

                                    <input type="text
                                    " class="form-control"
                                        name="employee_id" id="emp_id">

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Leave Date:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="leave_date" id="leave_date_id"
                                                readonly>
                                            @error('leave_date')
                                                <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>


                                    <label class="font-weight-bolder text-primary">Morning</label>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>AM1</label>
                                            <input type="time" class="form-control" name="am1" id="am1_id">

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>AM1 Code</label>
                                            <select class="form-control" name="am1_code" id="am1_code_id">
                                                <option value="">Select</option>
                                                <option value="T">Official Travel</option>
                                                <option value="P">Gate Pass/3PM</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>AM2</label>
                                            <input type="time" class="form-control" name="am2" id="am2_id">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>AM2 Code</label>
                                            <select class="form-control" name="am2_code" id="am2_code_id">
                                                <option value="">Select</option>
                                                <option value="T">Official Travel</option>
                                                <option value="P">Gate Pass/3PM</option>
                                            </select>
                                        </div>
                                    </div>

                                    <label class="font-weight-bolder text-primary">Afternoon</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>PM1</label>
                                            <input type="time" class="form-control" name="pm1" id="pm1_id">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>PM1 Code</label>
                                            <select class="form-control" name="pm1_code" id="pm1_code_id">
                                                <option value="">Select</option>
                                                <option value="T">Official Travel</option>
                                                <option value="P">Gate Pass/3PM</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>PM2</label>
                                            <input type="time" class="form-control" name="pm2" id="pm2_id">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>PM2 Code</label>
                                            <select class="form-control" name="pm2_code" id="pm2_code_id">
                                                <option value="">Select</option>
                                                <option value="T">Official Travel</option>
                                                <option value="P">Gate Pass/3PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name="remarks" id="remarks_id" cols="5" rows="3"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="modalFooter" class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    @push('scripts')
        <script>
            // calling the modal
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });


            $(document).ready(function() {
                $(".btn_leave").on("click", function() {

                    $("#leaveModals").modal(open).show();

                    var emp_id = $(this).attr('data-id');

                    $('#emp_id').val(emp_id);

                    // var id = JSON.parse($("#emp_id").val());

                    // events: function(fetchInfo, successCallback, failureCallback) {
                    // $.ajax({
                    //     url: "{{ route('calendar-leave') }}",
                    //     type: "get",
                    //     data: {
                    //         emp_id: id,
                    //         _token: CSRF_TOKEN
                    //     },
                    //     dataType: "json",
                    //     success: function(data) {
                    //         calendar.addEventSource('/calendar-leave');
                    //         var eventSource = calendar.getEventSources();
                    //         eventSource[0].refetch();
                    //     }

                    // });

                    // }




                });

            });
        </script>
        <script>
            var SITEURL = "{{ url('/') }}";
            document.addEventListener('DOMContentLoaded',
                function() {
                    var emp_id = $("#emp_id").val();

                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        displayEventTime: false,
                        editable: true,
                        contentHeight: 450,
                        initialDate: new Date(),
                        headerToolbar: {
                            left: 'title',
                            center: '',
                            right: 'today prev,next'
                        },
                        selectable: true,
                        dayMaxEvents: true, // allow "more" link when too many events
                        dateClick: function(info) {
                            $('#leave_date_id').val(info.dateStr);
                        },
                        initialView: 'dayGridMonth',
                        // events: function(info, successCallback, failureCallback) {
                        //     successCallback([{
                        //         url: SITEURL + "/calendar-leave",
                        //         display: 'background'
                        //     }]);
                        // }
                        eventSources: [{
                            url: SITEURL + "/calendar-leave",
                            display: 'background'
                        }]
                    });


                    $('#leaveModals').on('shown.bs.modal', function() {
                        calendar.render();
                    });
                });


            $('#emp_id').on('change', function() {
                calendar.refetchEvents();
            })
        </script>
    @endpush
@endsection
