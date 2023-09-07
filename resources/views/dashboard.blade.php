<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Laravel</title>

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css"
                href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

            <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


            <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <!-- Styles -->

        </head>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <h2>Student Result Information</h2>

                        <button type="button" class="my-3 btn btn-primary" data-toggle="modal"
                            data-target="#studentModal">
                            Add Student
                        </button>
                        <button type="button" class="my-3 btn btn-primary" data-toggle="modal"
                            data-target="#subjectModal">
                            Add Subject
                        </button>
                        <!-- start datatable student result details-->

                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Student Name</th>
                                    <th>email</th>
                                    <th>class</th>
                                    <th>address</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- end datatable employee leaves details-->

                        <!-- start apply leave  modal -->
                        <div class="modal" id="studentModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Leave Type</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <form id="applyleaveForm" method="POST" enctype="multipart/form-data">

                                        {{-- <input type="hidden" name="id" id="id"> --}}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="employee_code">Employee Code:</label>
                                                        <input type="text" name="employee_code" class="form-control "
                                                            id="employee_code">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="from_date">From Date:</label>
                                                        <input type="date" name="from_date" class="form-control date"
                                                            id="from_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="to_date">To Date:</label>
                                                        <input type="date" name="to_date" class="form-control date"
                                                            id="to_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="leave_type">Leave Type:</label>
                                                    {{-- <select name="leave_type" id="leave_type">
                                                        @foreach ($leaveType as $leave)
                                                            <option value="{{ $leave->leavetype }}">
                                                                {{ $leave->leavetype }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="comments">Comments:</label>
                                                    <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" onclick="saveData('applyleaveForm','studentModal')"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end apply leave  modal -->
                        <!-- start  subject modal -->
                        <div class="modal" id="subjectModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add subject</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <form id="addsubjectForm" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" name="subject_id" id="subject_id">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">subject:</label>
                                                        <input type="text" name="name" class="form-control "
                                                            id="name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" onclick="saveData('addsubjectForm','subjectModal')"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end  subject modal -->
                    </div>
                </div>
            </div>
        </div>
        {{-- <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            const saveData = (formId, modal) => {

                let url = '';
                let formData = '';
                if (formId == "EmployeeRegisterForm") {
                    url = "{{ route('employee_store') }}";
                    formData = {
                        employee_name: $("#employee_name").val(),
                        employee_code: $("#register_employee_code").val(),
                        username: $("#username").val(),
                        email: $("#email").val(),
                        phone: $("#phone").val(),
                        password: $("#password").val(),
                        address: $("#address").val(),
                        country_id: $("#country_id").val(),
                        state_id: $("#state_id").val(),
                        city_id: $("#city_id").val(),
                        zip: $("#zip").val(),
                    }
                } else if (formId == "addleavetypeForm") {
                    url = "{{ route('store') }}";
                    formData = {
                        leave_type: $("#register_leave_type").val(),
                    }
                } else if (formId == "applyleaveForm") {
                    url = "{{ route('leaveapply_store') }}";
                    formData = {
                        leave_type: $("#leave_type").val(),
                        employee_code: $("#employee_code").val(),
                        from_date: $("#from_date").val(),
                        to_date: $("#to_date").val(),
                        comments: $("#comments").val(),
                    }
                } else {
                    url = "{{ route('holiday_store') }}";
                    formData = {
                        date: $("#date").val(),
                    }
                }

                console.log(" formId : ", formData);
                // Saving Data..
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == "200") {
                            $("#" + modal).modal('hide');
                            toastr.success(data.message);

                            // Harshbhai aaya reset nu joi le jo form
                            // $("#formId")
                            // form1.reset();
                            const form = document.getElementById(formId);
                            form.reset();
                            $('#table').DataTable().ajax.reload();
                            $("#id").val("");
                        } else if (data.status == "422") {
                            data.data.forEach(function(error) {
                                toastr.error(error);
                            })
                        } else {
                            console.log(data);
                            toastr.error("something Went Wroung");
                        }
                    }
                })

            }

            $('#country_id').change(function(event) {
                var countryid = this.value;
                $('#state_id').html('');
                $.ajax({
                    url: "{{ route('api-fetch-state') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        country_id: countryid,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#state_id').html('<option value=""> select state </option>');
                        $.each(response.state, function(index, val) {
                            $('#state_id').append('<option value="' + val.id + '"> ' +
                                val.name + ' </option>')
                        });
                        $('#city_id').html('<option value=""> select city </option>');
                    }
                });
                //alert(countryid);
            });

            $('#state_id').change(function(event) {
                var stateid = this.value;
                $('#city_id').html('');
                $.ajax({
                    url: "{{ route('api-fetch-city') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        state_id: stateid,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#city_id').html('<option value=""> select City </option>');
                        $.each(response.city, function(index, val) {
                            $('#city_id').append('<option value="' + val.id + '"> ' +
                                val.name + ' </option>')
                        });

                    }
                });
                //alert(countryid);
            });

            $(function() {
                $('#table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('datatable') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'employeecode',
                            name: 'employee_code'
                        },
                        {
                            data: 'leavetype',
                            name: 'leave_type'
                        },
                        {
                            data: 'numberofDays',
                            name: 'numberofDays'
                        },
                        {
                            data: 'fromdate',
                            name: 'from_date'
                        },
                        {
                            data: 'todate',
                            name: 'to_date'
                        }


                    ]
                });
            });
        </script> --}}
    </div>
</x-app-layout>
