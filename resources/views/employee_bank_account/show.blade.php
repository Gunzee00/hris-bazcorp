@extends('layout.main')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        </div>
        <section class="content">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center mb-2">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="background-color: transparent;">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="/admin/employee-carrer">Employee Carrer</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="col-form-label form-label">Employee ID</label>
                                <input name="shift_daily_code" value="{{ $employee_bank_account->employee_id }}" type="text"
                                    class="form-control" disabled>
                            </div>
                            <div class="col-md-8">
                                <label class="col-form-label form-label">Bank Name</label>
                                <input name="start_time" value="{{ $employee_bank_account->bank_name }}" type="text"
                                    class="form-control" disabled>
                            </div>
                            <div class="col-md-8">
                                <label class="col-form-label form-label">Branch Name</label>
                                <input name="end_time" value="{{ $employee_bank_account->bank_branch }}" type="text"
                                    class="form-control" disabled>
                            </div>
                            <div class="col-md-8">
                                <label class="col-form-label form-label">Bank Account</label>
                                <input name="break_start" value="{{ $employee_bank_account->bank_account }}" type="text"
                                    class="form-control" disabled>
                            </div>
                            <div class="col-md-8">
                                <label class="col-form-label form-label">Account Name</label>
                                <input name="break_end" value="{{ $employee_bank_account->account_name }}" type="text"
                                    class="form-control" disabled>
                            </div>
                            <div class="col-md-8">
                                <label></label>
                                <div class=""
                                    style="d-flex justify-content-center align-items-center text-align:center">
                                    <a href="{{ route('admin.employee_bank_account.edit', ['id' => $employee_bank_account->id]) }}" class="btn btn-success">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        const checkbox = document.getElementById('flex_check');
        const hiddenInput = document.querySelector('input[name="flexible_shift"]');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                hiddenInput.value = 1; // Set value to 1 when checked
            } else {
                hiddenInput.value = 0; // Set value to 0 when unchecked
            }
        });
    </script>

@stop
