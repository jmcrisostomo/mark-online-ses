@extends('user.dashboard')

@section('studentPayment')
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- documentModal -->
    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
        <form class="form" method="POST" action="{{ route('submit.payment.approve') }}" enctype="multipart/form-data">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="documentModalLabel">View</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Generate Data Here --}}

                    </div>
                    <div class="modal-footer">
                        @csrf
                        <input type="hidden" id="transactionId" name="transaction_id">
                        <button type="submit" class="btn btn-success">Approve Payment</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('studentPaymentScript')
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
            // let paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'), {})
            $('.student-datatable').on('click', '.docs', function() {
                let dataTransactionId = $(this).attr('data-transaction-id');
                setTimeout(() => {
                    // console.log(dataStudentId)
                    document.querySelector('#documentModal #transactionId').value =
                        dataTransactionId
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
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            // $('.student-datatable').on('click', '.pay', function() {
            //     let dataTransactionId = $(this).attr('data-transaction-id');
            //     setTimeout(() => {
            //         document.querySelector('#paymentModal #transactionId').value =
            //             dataTransactionId
            //         paymentModal.show()
            //     }, 100);

            // });

        });
    </script>
@endsection
