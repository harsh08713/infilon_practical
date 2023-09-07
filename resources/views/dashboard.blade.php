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
                        <button type="button" class="my-3 btn btn-primary" data-toggle="modal"
                            data-target="#resultModal">
                            Add Result
                        </button>
                        <!-- start datatable student result details-->

                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Student Id</th>
                                    <th>Subject Id</th>
                                    <th>class Id</th>
                                    <th>Marks</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                        </table>

                        <div class="modal" id="studentModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Student</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <form id="addstudentModal" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" name="id" id="id">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Student Name:</label>
                                                        <input type="text" name="name" class="form-control "
                                                            id="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input type="email" name="email" class="form-control "
                                                            id="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="class_id">Class:</label>
                                                        <select name="class_id" id="class_id">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address:</label>
                                                        <input type="text" name="address" class="form-control "
                                                            id="address">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" onclick="saveData('addstudentModal','studentModal')"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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

                                        {{-- <input type="hidden" name="subject_id" id="subject_id"> --}}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Subject:</label>
                                                        <input type="text" name="name" class="form-control "
                                                            id="subject_name">
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

                        <div class="modal" id="resultModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Result</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <form id="addresultForm" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" name="result_id" id="result_id">
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="student_id">Student:</label>
                                                        <select name="student_id" id="student_id">
                                                            @foreach ($studentlist as $student)
                                                                <option value="{{ $student->id }}">
                                                                    {{ $student->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="subject_id">Subject:</label>
                                                        <select name="subject_id" id="subject_id">
                                                            @foreach ($subjectlist as $subject)
                                                                <option value="{{ $subject->id }}">
                                                                    {{ $subject->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="class_id">Class:</label>
                                                        <select name="class_id" id="class_id">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="marks">Marks:</label>
                                                        <input type="number" name="marks" class="form-control "
                                                            id="marks">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" onclick="saveData('addresultForm','resultModal')"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
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
                if (formId == "addstudentModal") {
                    url = "{{ route('student_store') }}";
                    formData = {
                        name: $("#name").val(),
                        email: $("#email").val(),
                        class_id: $("#class_id").val(),
                        address: $("#address").val(),
                    }
                } else if (formId == "addsubjectForm") {
                    url = "{{ route('store') }}";
                    formData = {
                        name: $("#subject_name").val(),
                    }
                } else if (formId == "addresultForm") {
                    url = "{{ route('result_store') }}";
                    formData = {
                        marks: $("#marks").val(),
                        subject_id: $("#subject_id").val(),
                        class_id: $("#class_id").val(),
                        student_id: $("#student_id").val(),

                    }
                } else {
                    return "something went wrongh";
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
                            data: 'student_id',
                            name: 'student_id'
                        },
                        {
                            data: 'subject_id',
                            name: 'subject_id'
                        },
                        {
                            data: 'class_id',
                            name: 'class_id'
                        },
                        {
                            data: 'marks',
                            name: 'marks'
                        },

                    ]
                });
            });
        </script>
    </div>
</x-app-layout>
