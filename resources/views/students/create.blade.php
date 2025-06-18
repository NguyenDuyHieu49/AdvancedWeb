@extends('layouts.app')

@section('content')
<div class="container py-4"> {{-- Added py-4 for vertical padding --}}
    <h1 class="mb-4">Thêm sinh viên</h1> {{-- Added mb-4 for margin below heading --}}
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên</label> {{-- Added form-label and for attribute --}}
            <input type="text" name="name" id="name" class="form-control" required> {{-- Added id attribute --}}
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Ngày sinh</label>
            <input type="date" name="birthday" id="birthday" class="form-control">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Ảnh đại diện</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success me-2">Lưu</button> {{-- Added me-2 for right margin --}}
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection