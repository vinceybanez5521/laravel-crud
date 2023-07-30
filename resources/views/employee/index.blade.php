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
                    <h1 class="card-title fw-light">Employees</h1>
                    <a href="{{ route('employee.create') }}" class="btn btn-primary">Add New Employee</a>
                </div>
                <div class="card-body">
                    @if (empty($employees))
                        <p class="lead text-center">No employees yet</p>
                    @endif

                    @if (!empty($employees))
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Gender</th>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->full_name }}</td>
                                            <td>{{ $employee->formatted_gender }}</td>
                                            <td>{{ $employee->position->name }}</td>
                                            <td>{{ $employee->formatted_salary }}</td>
                                            <td>
                                                <a href="{{ route('employee.show', ['id' => $employee->id]) }}" class="btn btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $employees->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection