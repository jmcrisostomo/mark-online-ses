@extends('user.dashboard')

@section('studentInfo')
    <div class="container mt-5">
        <h2 class="mb-4">Student Info</h2>
        <section style="background-color: #eee;">
            <div class="container py-5">
                {{-- <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{ $name }}</h5>




                                <p class="text-muted mb-1">STATUS:
                                    @if ($studentInfo->status == 'PENDING')
                                        <span class="badge bg-warning text-dark">{{ $studentInfo->status }}</span>
                                    @elseif ($studentInfo->status == 'APPROVED')
                                        <span class="badge bg-primary">{{ $studentInfo->status }}</span>
                                    @elseif ($studentInfo->status == 'PROCESSING')
                                        <span class="badge bg-primary">{{ $studentInfo->status }}</span>
                                    @elseif ($studentInfo->status == 'DECLINED')
                                        <span class="badge bg-danger">{{ $studentInfo->status }}</span>
                                    @elseif ($studentInfo->status == 'ENROLLED')
                                        <span class="badge bg-success">{{ $studentInfo->status }}</span>
                                    @else
                                        <span class="badge bg-light">{{ $studentInfo->status }}</span>
                                    @endif
                                </p>
                                <p class="text-muted mb-1">REQUIREMENT STATUS:
                                    @if ($studentInfo->student_requirement_status == 'COMPLETED')
                                        <span class="badge bg-success">{{ $studentInfo->student_requirement_status }}</span>
                                    @elseif ($studentInfo->student_requirement_status == 'INCOMPLETE')
                                        <span class="badge bg-warning text-dark">REVIEWING</span>
                                    @else
                                        <span class="badge bg-light">{{ $studentInfo->student_requirement_status }}</span>
                                    @endif
                                </p>
                                {{-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> --}}
                                {{-- <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-primary">Follow</button>
                                    <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0 d-none">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fas fa-globe fa-lg text-warning"></i>
                                        <p class="mb-0">https://mdbootstrap.com</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                        <p class="mb-0">@mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $studentInfo->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Mobile</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $studentInfo->contact_number }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Birthdate</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $studentInfo->birth_date }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $studentInfo->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span>
                                            Project Status
                                        </p>
                                        <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 72%"
                                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 89%"
                                                aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 55%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                        <div class="progress rounded mb-2" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 66%"
                                                aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span>
                                            Project Status
                                        </p>
                                        <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 72%"
                                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 89%"
                                                aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 55%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                        <div class="progress rounded mb-2" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 66%"
                                                aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="container mt-5">
                            <h2 class="mb-4">Payments</h2>

                            @if (session('message'))
                                <div class="alert alert-primary" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <table class="table table-bordered student-datatable bg-light">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Trn #</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- documentModal -->
                    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="documentModalLabel">View</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- Generate Data Here --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- paymentModal -->
                    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel"
                        aria-hidden="true">
                        <form class="form row" method="POST" action="{{ route('submit-receipt') }}"
                            enctype="multipart/form-data">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="paymentModalLabel">Pay</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Send your payment to these online payment modes:</p>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Gcash</th>
                                                            <th>BDO</th>
                                                            <th>BPI</th>
                                                            <th>UB</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bold">ONLINE-SES</span>
                                                                    <span>09986762273</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bold">ONLINE-SES-BDO</span>
                                                                    <span>788579284884</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bold">ONLINE-SES-BPI</span>
                                                                    <span>3336032132</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bold">ONLINE-SES-UB</span>
                                                                    <span>255746739</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12 mb-5">
                                                <p>After sending your payment, upload your receipt here:</p>
                                                <div class="input-control">
                                                    @csrf

                                                    <input class="input-field" type="file" id="formReceipt"
                                                        name="receipt" accept="image/png, image/gif, image/jpeg" required>
                                                    <label for="formReceipt" class="input-label">Receipt</label>
                                                    <input type="hidden" id="transactionId" name="transaction_id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Pay</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@section('studentInfoScript')
    <script type="text/javascript">
        function getRequirements(studentId) {

            let req = fetch('{{ url('/data/student/payment') }}' + '/' + studentId, {
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

            let documentModal = new bootstrap.Modal(document.getElementById('documentModal'), {})
            let paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'), {})
            $('.student-datatable').on('click', '.docs', function() {
                let dataTransactionId = $(this).attr('data-transaction-id');
                setTimeout(() => {
                    // console.log(dataStudentId)
                    getRequirements(dataTransactionId)
                    documentModal.show()
                }, 100);

            });

            var table = $('.student-datatable').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ $dataTable }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'status_badge',
                        name: 'status'
                    },
                    {
                        data: 'transaction_number',
                        name: 'transaction_number'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'amount_dec',
                        name: 'amount'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            $('.student-datatable').on('click', '.pay', function() {
                let dataTransactionId = $(this).attr('data-transaction-id');
                setTimeout(() => {
                    document.querySelector('#paymentModal #transactionId').value =
                        dataTransactionId
                    paymentModal.show()
                }, 100);

            });

        });
    </script>
@endsection

{{-- id: 20,
 course_id: 11,
 student_code: "00000020",
 type: "NEW",
 status: "PENDING",
 student_requirement_status: "INCOMPLETE",
 first_name: "JM",
 last_name: "Crisostomo",
 middle_name: "Estacio",
 birth_date: "1997-07-18",
 birth_place: "Sta Mesa, Manila",
 contact_number: "09309844642",
 email: "jm.crisostomo.e@gmail.com",
 gender: "M",
 civil_status: "Single",
 nationality: "Filipino",
 religion: null,
 address: "146 Mahogany St., A.V. Cruz, Kalawaan, Pasig City",
 branch: "1",
 year: "2023",
 semester: "1",
 decline_reason: null,
 guardian_name: null,
 guardian_occupation: null,
 guardian_number: null,
 modified_by: "SYSTEM",
 updated_at: "2023-02-17 18:29:19",
 created_at: "2023-02-17 18:29:19" --}}
