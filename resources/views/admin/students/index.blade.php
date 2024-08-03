@extends('admin.app')
@section('content')
    <!-- DataTales Example -->
    <a class="btn btn-primary mb-3" href="{{ route('students.create') }}">Create Siswa</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Nomor HP</th>
                            <th>NIS</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $item)
                            <tr>
                                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->student_number }}</td>
                                <td>
                                    @if ($item->gender == 'l')
                                        Laki-laki
                                    @elseif ($item->gender == 'p')
                                        Perempuan
                                    @else
                                        {{ $item->gender }}
                                    @endif
                                </td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    @if ($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}"
                                            alt="Photo of {{ $item->first_name }}" style="width: 100px; height: auto;">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('students.edit', $item->id) }}" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                    <form action="{{ route('students.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger delete-button"><i class="fas fa-fw fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    @include('admin.layouts.sweetalert')
@endsection
