@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@extends('layouts.main')

@section('content')
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Add New Student</strong>
              </div>           
              <div class="card-body">
                <form action="{{ route('students.store') }}" method="POST">
                  @csrf
                  
                  @include('students._form')

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
