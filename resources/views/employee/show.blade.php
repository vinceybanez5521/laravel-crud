@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
                <div class="card-header d-md-flex justify-content-between align-items-center">
                    <h1 class="card-title fw-light">Employee Information</h1>
                    <a href="{{ route('employee.index') }}" class="btn btn-primary">Employees</a>
                </div>
                <div class="card-body">
                    <p class="lead-sm mb-0">First Name</p>
                    <p class="lead">{{ $employee->first_name }}</p>

                    <p class="lead-sm mb-0">Last Name</p>
                    <p class="lead">{{ $employee->last_name }}</p>

                    <p class="lead-sm mb-0">Gender</p>
                    <p class="lead">{{ $employee->formatted_gender }}</p>

                    <p class="lead-sm mb-0">Hobbies</p>
                    <p class="lead">{{ $employee->formatted_hobbies }}</p>

                    <p class="lead-sm mb-0">Position</p>
                    <p class="lead">{{ $employee->position->name }}</p>

                    <p class="lead-sm mb-0">Salary</p>
                    <p class="lead">{{ $employee->formatted_salary }}</p>

                    <p class="lead-sm mb-0">Created At</p>
                    <p class="lead">{{ $employee->formatted_created_at }}</p>

                    <div class="mb-3 d-flex gap-2">
                        <a href="{{ route('employee.edit', ['id' => $employee->id]) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('employee.destroy') }}" method="POST"
                            enctype="application/x-www-form-urlencoded" class="d-inline deleteEmployeeForm">
                            @method('DELETE')
                            @csrf

                            <input type="hidden" name="id" value="{{ $employee->id }}">
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection