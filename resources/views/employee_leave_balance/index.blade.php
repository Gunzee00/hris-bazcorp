@extends('layout.main')

@section('title', 'Employe')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <section class="content">
            <div class="container-fluid px-4">
                <div class="card shadow mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center mb-2">
                            <div class="col">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb" style="background-color: transparent;">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Employee Leave Balance</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('admin.employee_leave_balance.create') }}" class="btn btn-success"
                                    style="padding: 0.1rem 0.5rem;"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Leave Type</th>
                                            {{-- <th>Leave Status</th> --}}
                                            <th>Employee</th>
                                            <th>Balance</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employee_leave_balance as $employee_leave_balance)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span>{{ $employee_leave_balance->leave_type->leave_name }}</span>
                                                </td>
                                                {{-- <td>
                                                    <span>{{ $employee_leave_balance->leave_status }}</span>
                                                </td> --}}
                                                <td>
                                                    <span>{{ $employee_leave_balance->employee->firstname }} {{ $employee_leave_balance->employee->lastname }}</span>
                                                </td>
                                                <td>
                                                    <span>{{ $employee_leave_balance->balance }}</span>
                                                </td>
                                                <td style="width: 10px;align= center">
                                                    <a
                                                        href="{{ route('admin.employee_leave_balance.show', ['id' => $employee_leave_balance->id]) }}">
                                                        <span class="icon">
                                                            <i class="fas fa-info-circle"></i>
                                                        </span>
                                                    </a>
                                                    <a
                                                        href="{{ route('admin.employee_leave_balance.edit', ['id' => $employee_leave_balance->id]) }}">
                                                        <span class="icon">
                                                            <i class="fas fa-pencil-alt"></i> <!-- Icon pensil (pencil) -->
                                                        </span>
                                                    </a>
                                                    <div class="modal fade" id="deleteConfirmationModal{{ $employee_leave_balance->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteConfirmationModalLabel">Confirm Deletion
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        onclick="submitDeleteForm({{ $employee_leave_balance->id }})">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form id="deleteForm{{ $employee_leave_balance->id }}"
                                                        action="{{ route('admin.employee_leave_balance.destroy', ['id' => $employee_leave_balance->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a href="#"
                                                        onclick="event.preventDefault(); $('#deleteConfirmationModal{{ $employee_leave_balance->id }}').modal('show');">
                                                        <span class="icon">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function submitDeleteForm(id) {
            const form = document.getElementById(`deleteForm${id}`);
            form.submit();
        }
    </script>
@stop
