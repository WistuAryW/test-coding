@extends('admin.app')

@section('content')
    <div class="container">
        <a href="{{ route('extracurriculars.create') }}" class="btn btn-primary mb-3">Tambah Extracurricular</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Ekstrakurikuler</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Ekstrakurikuler</th>
                            <th>Tahun Mulai</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($extracurriculars as $extracurricular)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $extracurricular->student->first_name }} {{ $extracurricular->student->last_name }}</td>
                                <td>{{ $extracurricular->name }}</td>
                                <td>{{ $extracurricular->start_year }}</td>
                                <td>
                                    <a href="{{ route('extracurriculars.edit', $extracurricular->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('extracurriculars.destroy', $extracurricular->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger delete-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $extracurriculars->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
