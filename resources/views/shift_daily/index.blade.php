@extends('layout.main')

@section('title', 'Employe')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <section class="content">
            <div class="container-fluid px-4">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center mb-2">
                        <div class="col">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb" style="background-color: transparent;">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shift Daily</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.shift_daily.create') }}" class="btn btn-success"
                                style="padding: 0.1rem 0.5rem;"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Shift Daily Code</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Break Time</th>
                                        <th>Day Type</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shift_daily as $shift)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $shift->shift_daily_code }}</td>
                                            <td>{{ $shift->start_time }}</td>
                                            <td>{{ $shift->end_time }}</td>
                                            <td>
                                                @if ($shift->break_start && $shift->break_end)
                                                    {{ \Carbon\Carbon::parse($shift->break_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($shift->break_end)->format('H:i') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $shift->day_type }}</td>
                                            <td>{{ $shift->remark }}</td>
                                            <td>
                                                <a href="{{ route('admin.shift_daily.show', ['id' => $shift->id]) }}">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                                <a href="{{ route('admin.shift_daily.edit', ['id' => $shift->id]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="#"
                                                   onclick="event.preventDefault(); $('#deleteConfirmationModal{{ $shift->id }}').modal('show');">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteConfirmationModal{{ $shift->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this shift?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <form id="deleteForm{{ $shift->id }}" action="{{ route('admin.shift_daily.destroy', ['id' => $shift->id]) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
