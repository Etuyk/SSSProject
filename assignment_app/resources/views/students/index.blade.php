@extends('layouts.main')

@section('title', 'Students')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Students</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Student
        </a>
    </div>

    <form method="GET" action="{{ route('students.index') }}" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <select name="college_id" class="form-select" onchange="this.form.submit()">
                    @foreach($colleges as $id => $name)
                        <option value="{{ $id }}" {{ request('college_id') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    @include('students._sort')

    @if($students->isEmpty())
        <div class="alert alert-info">No students found.</div>
    @else

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>College</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ \Carbon\Carbon::parse($student->dob)->format('d M Y') }}</td>
                        <td>{{ $student->college->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this student?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
