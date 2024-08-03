@extends('admin.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Siswa</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="first_name">First Name:</label>
                            <input class="form-control" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="last_name">Last Name:</label>
                            <input class="form-control" type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="phone_number">Phone Number:</label>
                            <input class="form-control" type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="student_number">NIS:</label>
                            <input class="form-control" type="text" id="student_number" name="student_number" value="{{ old('student_number') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="gender">Gender:</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="l" {{ old('gender') == 'l' ? 'selected' : '' }}>Laki Laki</option>
                                <option value="p" {{ old('gender') == 'p' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="photo">Photo:</label>
                            <input class="form-control" type="file" id="photo" name="photo">
                        </div>
                    </div>
                </div>
                
                            
                <div class="form-floating mb-3">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" required>{{ old('address') }}</textarea>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a class=" btn btn-dark mx-3" href="{{ route('students.index') }}">Back</a>
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        
            
        </div>
    </div>
    
@endsection
