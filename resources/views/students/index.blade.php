{{-- filepath: resources/views/students/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-4"> {{-- Use Bootstrap's container for responsive width and padding --}}
    <div class="row justify-content-center"> {{-- Center the content horizontally --}}
        <div class="col-md-10"> {{-- Define column width for the main content area --}}
            <div class="card shadow-sm"> {{-- Use Bootstrap card for a clean, contained look with subtle shadow --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="card-title mb-0 text-primary">Danh sách sinh viên</h2> {{-- Bootstrap primary text color --}}
                    <a href="{{ route('students.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-1"></i> {{-- Example: Bootstrap Icons (if linked) --}}
                        Thêm sinh viên
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"> {{-- Bootstrap alert for success message --}}
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive"> {{-- Ensures table is scrollable on small screens --}}
                        <table class="table table-hover align-middle mb-0"> {{-- Bootstrap table classes for styling and hover effect --}}
                            <thead class="table-light"> {{-- Lighter background for table header --}}
                                <tr>
                                    <th scope="col" class="text-center">Ảnh</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                <tr class="table-row"> {{-- Custom class if you need specific row styling --}}
                                    <td class="text-center">
                                        @if($student->avatar)
                                            <img src="{{ asset('storage/'.$student->avatar) }}" class="rounded-circle border border-primary p-1" style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
                                        @else
                                            <span class="text-muted fst-italic">Không có</span>
                                        @endif
                                    </td>
                                    <td class="fw-semibold text-break">{{ $student->name }}</td> {{-- font-weight-semibold --}}
                                    <td class="text-break">{{ $student->email }}</td>
                                    <td>{{ $student->birthday }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Student Actions">
                                            <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm **me-1**">Xem</a>
                                            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm **me-1**">Sửa</a>
                                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Chưa có sinh viên nào.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection