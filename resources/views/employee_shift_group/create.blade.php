@extends('layout.main')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <section class="content">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center mb-2">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="background-color: transparent;">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.employee_shift_group') }}">Shift Daily Group</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.employee_shift_group.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="container-fluid px-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Shift Group</label>
                                    <select name="shift_group_id" class="form-control" required>
                                        <option value="" disabled selected>Select Shift Group</option>
                                        @foreach ($shift_groups as $shift_group)
                                            <option value="{{ $shift_group->id }}">{{ $shift_group->group_code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Start Shift Date</label>
                                    <input name="start_shift_date" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">End Shift Date</label>
                                    <input name="end_date" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="available-employees">Available Employees:</label>
                                    <select id="available-employees" class="form-control" multiple>
                                        @foreach ($employees as $emp)
                                            <option value="{{ $emp->id }}">{{ $emp->name }} (ID: {{ $emp->employee_no }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 d-flex justify-content-around">
                                    <button type="button" id="addButton" class="btn btn-primary">Add &gt;&gt;</button>
                                    <button type="button" id="removeButton" class="btn btn-danger">&lt;&lt; Remove</button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="chosen-employees">Chosen Employees:</label>
                                    <select id="chosen-employees" name="chosen_employees[]" class="form-control" multiple required></select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-8 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            var availableEmployees = document.getElementById('available-employees');
            var chosenEmployees = document.getElementById('chosen-employees');

            for (var i = 0; i < availableEmployees.options.length; i++) {
                var option = availableEmployees.options[i];
                if (option.selected) {
                    chosenEmployees.appendChild(option);
                    i--;
                }
            }
        });

        document.getElementById('removeButton').addEventListener('click', function() {
            var availableEmployees = document.getElementById('available-employees');
            var chosenEmployees = document.getElementById('chosen-employees');

            for (var i = 0; i < chosenEmployees.options.length; i++) {
                var option = chosenEmployees.options[i];
                if (option.selected) {
                    availableEmployees.appendChild(option);
                    i--;
                }
            }
        });
    </script>
@stop
