@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-md-flex justify-content-between align-items-center">
                    <h1 class="card-title fw-light">Add New Employees</h1>
                    <a href="{{ route('employee.index') }}" class="btn btn-primary">Employees</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="first-name" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="first-name" name="first_name" value="{{ old('first_name') }}">
                            @error('first_name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last-name" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                id="last-name" name="last_name" value="{{ old('last_name') }}">
                            @error('last_name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender"
                                    id="male" value="male" checked>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender"
                                    id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hobbies</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                    id="sports" value="sports">
                                <label class="form-check-label" for="sports">Sports</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                    id="movies" value="movies">
                                <label class="form-check-label" for="movies">Movies</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                    id="arts" value="arts">
                                <label class="form-check-label" for="arts">Arts</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                    id="cooking" value="cooking">
                                <label class="form-check-label" for="cooking">Cooking</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                    id="others" value="others">
                                <label class="form-check-label" for="others">Others</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="position_id" class="form-label">Position</label>
                            <select name="position_id" id="position_id" class="form-select @error('position_id') is-invalid @enderror">
                                <option value="" disabled selected>Select Position</option>
                                @foreach ($positions as $pos)
                                    <option value="{{ $pos->id }}">{{ $pos->name }}</option>
                                @endforeach
                            </select>
                            @error('position')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" class="form-control @error('salary') is-invalid @enderror"
                                id="salary" name="salary" value="{{ old('salary') }}">
                            @error('salary')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection