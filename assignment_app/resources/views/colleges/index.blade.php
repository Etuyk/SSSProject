@extends('layouts.main')

@section('title', 'Colleges')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Colleges</h2>
        <a href="{{ route('colleges.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add College
        </a>
    </div>

    @if($colleges->isEmpty())
        <div class="alert alert-info">No colleges found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($colleges as $college)
                    <tr>
                        <td>{{ $college->name }}</td>
                        <td>{{ $college->address }}</td>
                        <td>
                            <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>

                            <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this college?');">
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
