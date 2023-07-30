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
                    <h1 class="card-title fw-light">Positions</h1>
                    <a href="{{ route('position.create') }}" class="btn btn-primary">Add New Position</a>
                </div>
                <div class="card-body">
                    @if (empty($positions))
                    <p class="lead text-center">No positions yet</p>
                    @endif

                    @if (!empty($positions))
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($positions as $position)
                                <tr>
                                    <td>{{ $position->name }}</td>
                                    <td>{{ $position->created_at }}</td>
                                    <td>
                                        <a href="{{ route('position.edit', ['id' => $position->id]) }}"
                                            class="btn btn-success">Edit</a>
                                        <form action="{{ route('position.destroy') }}" class="d-md-inline mt-1 mt-md-0 deletePositionForm" method="POST" enctype="application/x-www-form-urlencoded">
                                            @method('DELETE')
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $position->id }}">
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePositionModal">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $positions->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection