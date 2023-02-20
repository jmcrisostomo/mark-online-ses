@extends('user.dashboard')

@section('studentTable')
    <div class="container mt-5">
        <h2 class="mb-4">Students</h2>

        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-bordered student-datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Code</th>
                    <th>Status</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>


    <!-- documentModal -->
    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentModalLabel">Documents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Generate Data Here --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- approveModal -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
        <form class="form" method="POST" action="{{ route('approve-student') }}" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="approveModalLabel">Approve Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf


                        {{-- {{ $test }} --}}
                        <div class="mb-3">
                            <small class="w-100 p-0 fw-bold">Student Info</small>
                        <input type="hidden" id="approveStudentId" name="student_id">
                        <p class="mb-1">Name: <span class="student-name fw-bold"></span></p>
                        <p class="mb-1">Course: <span class="student-course fw-bold"></span></p>
                        <p class="mb-1">Course Fee: <span class="student-course-fee fw-bold"></span></p>
                        </div>

                        <div class="d-flex flex-wrap">
                            <small class="w-100 p-0 fw-bold">Apply Misc Fees</small>
                            @foreach ($fee as $item)
                                <div class="form-check w-100">
                                    <input class="form-check-input cbfees" type="checkbox" value="{{ $item->id }}"
                                        id="flexCheck{{ $item->id }}" data-amount="{{ $item->amount }}" name="misc_fee[]">
                                    <label class="form-check-label" for="flexCheck{{ $item->id }}">
                                        {{ $item->fee_name }} <small class="fw-bold">({{ $item->amount }})</small>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="calculate-fees">
                            <small class="w-100 p-0 fw-bold">Subtotal</small>
                            <h5 class="subtotal">{data_subtotal}</h5>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Approve</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- declineModal -->
    <div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
        <form class="form" method="POST" action="{{ route('decline-student') }}" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="declineModalLabel">Decline Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <legend>Reason for Decline</legend> --}}
                        <div class="row bg-body-tertiary">
                            @csrf

                            <p class="mb-3">Name: <span class="student-name fw-bold"></span></p>

                            <input type="hidden" id="declineStudentId" name="student_id">

                            <div class="mb-3 col-md-12">
                                <div class="input-control">
                                    <textarea id="inputLname" name="decline_reason" class="input-field" placeholder="Reason" style="resize: none;" required></textarea>
                                    <label for="inputLname" class="input-label">Reason for Decline</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Decline</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('studentTableScript')
    <script type="text/javascript">
        function getRequirements(studentId) {



            let req = fetch('{{ url('/data/student/requirement') }}' + '/' + studentId, {
                    method: 'GET'
                })
                .then(res => res.json())
                .then(data => {

                    const wrapper = document.createElement("div");
                    wrapper.classList.add('text-center', 'd-flex', 'flex-wrap', 'align-items-center',
                        'justify-align--center');

                    data.forEach(item => {
                        const span = document.createElement("span");
                        span.innerText = item.requirement_type;
                        span.classList.add('w-50');
                        wrapper.append(span)

                        const img = document.createElement("img");
                        img.src = item.file;
                        img.classList.add('img-fluid', 'mb-3', 'w-50');
                        wrapper.append(img)

                        console.log(item)
                    })
                    // console.log(wrapper)

                    document.querySelector('#documentModal .modal-body').innerHTML = null;
                    document.querySelector('#documentModal .modal-body').append(wrapper)

                })
                .catch(err => console.error(err))

        }

        $(function() {

            let courseFee = 0.00;
            let subTotal = 0.00;

            var table = $('.student-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('students.list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'student_code',
                        name: 'student_code'
                    },
                    {
                        data: 'status_badge',
                        name: 'status'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });


            let documentModal = new bootstrap.Modal(document.getElementById('documentModal'), {})
            let approveModal = new bootstrap.Modal(document.getElementById('approveModal'), {})
            let declineModal = new bootstrap.Modal(document.getElementById('declineModal'), {})
            $('.student-datatable').on('click', '.docs', function() {
                let dataStudentId = $(this).attr('data-student-id');
                setTimeout(() => {
                    // console.log(dataStudentId)
                    getRequirements(dataStudentId)
                    documentModal.show()
                }, 100);

            });


            $('.student-datatable').on('click', '.approve', function() {

                let dataStudentId = $(this).attr('data-student-id');
                let dataStudentName = $(this).attr('data-student-name');
                let dataStudentCourse = $(this).attr('data-student-course');
                let dataStudentCourseFee = $(this).attr('data-student-course-fee');
                setTimeout(() => {
                    courseFee = parseFloat(dataStudentCourseFee)
                    subTotal = parseFloat(courseFee) + parseFloat(subTotal)
                    document.querySelector('.calculate-fees .subtotal').innerHTML = `PHP ${Number.parseFloat(subTotal).toFixed(2)}`

                    document.querySelector('#approveModal .student-name').innerHTML = dataStudentName
                    document.querySelector('#approveModal .student-course').innerHTML = dataStudentCourse
                    document.querySelector('#approveModal .student-course-fee').innerHTML = dataStudentCourseFee

                    document.querySelector('#approveModal #approveStudentId').value =
                        dataStudentId

                    approveModal.show()
                }, 100);

            });

            $('.student-datatable').on('click', '.decline', function() {
                let dataStudentId = $(this).attr('data-student-id');
                let dataStudentName = $(this).attr('data-student-name');

                setTimeout(() => {
                    document.querySelector('#declineModal .student-name').innerHTML =
                        dataStudentName

                    document.querySelector('#declineModal #declineStudentId').value =
                        dataStudentId

                    declineModal.show()
                }, 100);

            });




            $('.cbfees').on('click', function() {

                if ($(this).is(':checked')) {
                    subTotal = subTotal + parseFloat($(this).attr('data-amount'));
                } else {
                    subTotal = subTotal - parseFloat($(this).attr('data-amount'));
                }

                document.querySelector('.calculate-fees .subtotal').innerHTML = `PHP ${Number.parseFloat(subTotal).toFixed(2)}`
            });

        });
    </script>
@endsection
