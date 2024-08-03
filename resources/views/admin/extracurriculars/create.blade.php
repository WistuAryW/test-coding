@extends('admin.app')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Ekstrakurikuler</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('extracurriculars.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_id">Student</label>
                                <select class="form-control" id="student_id" name="student_id" required>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Extracurricular Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_year">Start Year</label>
                                <input type="number" class="form-control" id="start_year" name="start_year" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class=" btn btn-dark mx-3" href="{{ route('extracurriculars.index') }}">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
@endsection
