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
                            <li class="breadcrumb-item"><a href="{{ route('admin.shift_daily') }}">Shift Daily</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.shift_daily.update', ['id' => $shift_daily->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="shift_daily_code" class="col-form-label">Shift Daily Code</label>
                                <input name="shift_daily_code" id="shift_daily_code" value="{{ old('shift_daily_code', $shift_daily->shift_daily_code) }}" type="text" class="form-control" required>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="day_type" class="col-form-label">Day Type</label>
                                <select name="day_type" id="day_type" class="form-control" required>
                                    <option value="weekday" {{ old('day_type', $shift_daily->day_type) == 'weekday' ? 'selected' : '' }}>Weekday</option>
                                    <option value="holiday" {{ old('day_type', $shift_daily->day_type) == 'holiday' ? 'selected' : '' }}>Holiday</option>
                                    <option value="offday" {{ old('day_type', $shift_daily->day_type) == 'offday' ? 'selected' : '' }}>Offday</option>
                                </select>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="start_time" class="col-form-label">Start Time</label>
                                <input name="start_time" id="start_time" value="{{ old('start_time', $shift_daily->start_time) }}" type="time" class="form-control" required>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="end_time" class="col-form-label">End Time</label>
                                <input name="end_time" id="end_time" value="{{ old('end_time', $shift_daily->end_time) }}" type="time" class="form-control" required>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="grace_for_late" class="col-form-label">Grace for Late</label>
                                <div class="input-group">
                                    <input name="grace_for_late" id="grace_for_late" value="{{ old('grace_for_late', $shift_daily->grace_for_late) }}" type="number" class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Minute(s)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="productive_work_time" class="col-form-label">Productive Work Time</label>
                                <div class="input-group">
                                    <input name="productive_work_time" id="productive_work_time" value="{{ old('productive_work_time', $shift_daily->productive_work_time) }}" type="number" class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Minute(s)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="break_start" class="col-form-label">Break Time Start</label>
                                <input name="break_start" id="break_start" value="{{ old('break_start', $shift_daily->break_start) }}" type="time" class="form-control">
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="break_end" class="col-form-label">Break Time End</label>
                                <input name="break_end" id="break_end" value="{{ old('break_end', $shift_daily->break_end) }}" type="time" class="form-control">
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="remark" class="col-form-label">Remark</label>
                                <input name="remark" id="remark" value="{{ old('remark', $shift_daily->remark) }}" type="text" class="form-control">
                            </div>

                            <div class="col-md-8 mb-3">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    const checkbox = document.getElementById('flex_check');
    const hiddenInput = document.querySelector('input[name="flexible_shift"]');

    checkbox.addEventListener('change', function() {
        hiddenInput.value = this.checked ? 1 : 0; // Set value to 1 when checked, else 0
    });
</script>

@stop
