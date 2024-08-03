@extends('admin.app')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Extrakurikuler Siswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Extracurricular (Tahun Mulai)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->student_number }}</td>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>
                                    @if ($student->gender == 'l')
                                        Laki-laki
                                    @elseif ($student->gender == 'p')
                                        Perempuan
                                    @else
                                        {{ $student->gender }}
                                    @endif
                                </td>
                                <td>{{ $student->address }}</td>
                                <td class="d-flex justify-content-start">
                                    <ul>
                                        @foreach ($student->extracurriculars as $extracurricular)
                                            <li>{{ $extracurricular->name }} ({{ $extracurricular->start_year }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                                        data-target="#addExtracurricularModal"
                                        data-student-id="{{ $student->id }}">
                                        + Ekstrakurikuler
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addExtracurricularModal" tabindex="-1" role="dialog"
            aria-labelledby="addExtracurricularModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addExtracurricularModalLabel">Tambah Ekstrakurikuler</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addExtracurricularForm" action="{{ route('extra.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="student_id">Pilih Siswa</label>
                                <select class="form-control" id="student_id" name="student_id" required>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->first_name }}
                                            {{ $student->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Ekstrakurikuler</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="start_year">Tahun Mulai Mengikuti</label>
                                <input type="number" class="form-control" id="start_year" name="start_year" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    text: '{{ session('success') }}',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            @endif

            $('.delete-button').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $('#addExtracurricularModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var studentId = button.data('student-id'); // Extract info from data-* attributes

                var modal = $(this);
                modal.find('#student_id').val(studentId); // Set the student_id value in the modal
            });
        });
    </script>
@endsection
