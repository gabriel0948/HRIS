@extends('admin_layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Applying for Leave</h1>
    </div>


    <div class="card">
        <div class="card-body">

            <div id='calendar'></div>

        </div>
    </div>


    {{-- 
    @foreach ($data as $row)
        <p>{{ $row->start }}</p>
    @endforeach --}}

    @push('scripts')
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

                        eventSources: [{
                            url: SITEURL + "/calendar-leave",
                            display: 'background'
                        }]
                    });



                    calendar.render();

                });

            // document.addEventListener('DOMContentLoaded', function() {
            //     var calendarEl = document.getElementById('calendar');

            //     var calendar = new FullCalendar.Calendar(calendarEl, {
            //         contentHeight: 550,
            //         displayEventTime: false,
            //         initialDate: new Date(),
            //         headerToolbar: {
            //             left: 'prev,next today',
            //             center: 'title',
            //             right: 'dayGridMonth,listWeek'
            //         },

            //         defaultView: 'month',
            //         timeZone: 'local',
            //         selectable: true,
            //         selectHelper: true,
            //         dateClick: function(info) {
            //             $('#am1_id').val(info.dateStr);
            //             $('#am2_id').val(info.dateStr);
            //             $('#pm1_id').val(info.dateStr);
            //             $('#pm2_id').val(info.dateStr);

            //             $('#leaveModal').modal('show');
            //         },

            //         dayMaxEvents: true, // allow "more" link when too many events

            //     });

            //     calendar.render();
            // });
        </script>
    @endpush




    <!--Leave Modal -->
    <div class="modal fade" id="leaveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('leaveStore') }}" method="POST">
                    <div class="modal-body">


                        {{ csrf_field() }}
                        <input type="text" class="form-control" name="employee_id" id="employeeId">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">AM1_CODE</span>
                            </div>
                            <select class="form-control" name="am1_code" id="am1_code_id">
                                <option value="">Select</option>
                                <option value="N">Normal</option>
                                <option value="L">Leave</option>
                                <option value="T">Official Travel</option>
                                <option value="P">Gate Pass/3PM</option>
                            </select>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">AM1</span>
                            </div>
                            <input type="text" class="form-control" name="am1" id="am1_id">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">AM2_CODE</span>
                            </div>
                            <select class="form-control" name="am2_code" id="am2_code_id">
                                <option value="">Select</option>
                                <option value="N">Normal</option>
                                <option value="L">Leave</option>
                                <option value="T">Official Travel</option>
                                <option value="P">Gate Pass/3PM</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">AM2</span>
                            </div>
                            <input type="text" class="form-control" name="am2" id="am2_id">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">PM1_CODE</span>
                            </div>
                            <select class="form-control" name="pm1_code" id="pm1_code_id">
                                <option value="">Select</option>
                                <option value="N">Normal</option>
                                <option value="L">Leave</option>
                                <option value="T">Official Travel</option>
                                <option value="P">Gate Pass/3PM</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">PM1</span>
                            </div>
                            <input type="text" class="form-control" name="pm1" id="pm1_id">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">PM2_CODE</span>
                            </div>
                            <select class="form-control" name="pm2_code" id="pm2_code_id">
                                <option value="">Select</option>
                                <option value="N">Normal</option>
                                <option value="L">Leave</option>
                                <option value="T">Official Travel</option>
                                <option value="P">Gate Pass/3PM</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">PM2</span>
                            </div>
                            <input type="text" class="form-control" name="pm2" id="pm2_id">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Undertime</span>
                            </div>
                            <input type="date" class="form-control" name="undertime" id="undertime_id">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Remarks</span>
                            </div>
                            <input type="text" class="form-control" name="remarks" id="remarks_id">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
