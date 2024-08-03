@extends('admin.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('patch')

                <div class="row">
                    <div class="col-md-6">
                        <!-- First Name -->
                        <div class="form-floating mb-3">
                            <label class="form-label" for="first_name">First Name</label>
                            <input required type="text" name="first_name" value="{{ $user->first_name }}"
                                class="form-control" id="first_name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Last Name -->
                        <div class="form-floating mb-3">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input required type="text" name="last_name" value="{{ $user->last_name }}"
                                class="form-control" id="last_name" placeholder="Last Name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input required type="email" name="email" value="{{ $user->email }}" class="form-control"
                                id="email" placeholder="Email">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <!-- Birth Date -->
                        <div class="form-floating mb-3">
                            <label class="form-label" for="birth_date">Birth Date</label>
                            <input required type="date" name="birth_date" value="{{ $user->birth_date }}"
                                class="form-control" id="birth_date" placeholder="Birth Date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Gender -->
                        <div class="form-floating mb-3">
                            <label class="form-label" for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="l" {{ $user->gender == 'l' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="p" {{ $user->gender == 'p' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Password</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('change-password') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                    @error('current_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                    @error('new_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="form-control" required>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-dark">Change Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
