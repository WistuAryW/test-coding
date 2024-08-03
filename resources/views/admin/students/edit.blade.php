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
            <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="first_name">First Name:</label>
                            <input class="form-control" type="text" id="first_name" name="first_name"
                                value="{{ $student->first_name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="last_name">Last Name:</label>
                            <input class="form-control" type="text" id="last_name" name="last_name"
                                value="{{ $student->last_name }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="phone_number">Phone Number:</label>
                            <input class="form-control" type="text" id="phone_number" name="phone_number"
                                value="{{ $student->phone_number }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="student_number">NIS:</label>
                            <input class="form-control" type="text" id="student_number" name="student_number"
                                value="{{ $student->student_number }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label class="form-label" for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="l" {{ $student->gender == 'l' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="p" {{ $student->gender == 'p' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <label for="photo">Photo:</label>
                            <input class="form-control" type="file" id="photo" name="photo">
                            @if ($student->photo)
                                <img src="{{ $student->photo }}" alt="Photo saat ini" class="mt-2" style="width: 100px;">
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-floating mb-3">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" required>{{ $student->address }}</textarea>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a class=" btn btn-dark mx-3" href="{{ route('students.index') }}">Back</a>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>


        </div>
    </div>

@endsection
