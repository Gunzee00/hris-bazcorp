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
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.shift_daily.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="container-fluid px-4">
                            <!-- Shift Daily Code -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Shift Daily Code<span style="color: red;"> *</span></label>
                                    <input name="shift_daily_code" type="text" class="form-control" required>
                                </div>
                            </div>
                            <!-- Day Type -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Day Type<span style="color: red;"> *</span></label>
                                    <select name="day_type" id="day_type" class="form-control" required>
                                        <option value="Week Day">Week Day</option>
                                        <option value="Off Day">Off Day</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Start Time -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Start Time<span style="color: red;"> *</span></label>
                                    <input name="start_time" type="time" value="00:00" class="form-control" required>
                                </div>
                            </div>
                            <!-- End Time -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">End Time<span style="color: red;"> *</span></label>
                                    <input name="end_time" type="time" value="00:00" class="form-control" required>
                                </div>
                            </div>
                            <!-- Grace for Late -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Grace for Late<span style="color: red;"> *</span></label>
                                    <div class="input-group">
                                        <input name="grace_for_late" value="0" type="number" class="form-control" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Minute(s)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Productive Work Time -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Productive Work Time<span style="color: red;"> *</span></label>
                                    <div class="input-group">
                                        <input name="productive_work_time" value="0" type="number" class="form-control" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Minute(s)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Break Time Start -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Break Time Start</label>
                                    <input name="break_start" type="time" value="00:00" class="form-control">
                                </div>
                            </div>
                            <!-- Break Time End -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Break Time End</label>
                                    <input name="break_end" type="time" value="00:00" class="form-control">
                                </div>
                            </div>
                            <!-- Remark -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label form-label">Remark<span style="color: red;"> *</span></label>
                                    <input name="remark" type="text" class="form-control" required>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@stop
