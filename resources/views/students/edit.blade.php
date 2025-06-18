@extends('layouts.app')

@section('content')
<div class="container py-4"> {{-- Thêm padding dọc cho container --}}
    <div class="row justify-content-center"> {{-- Căn giữa nội dung thẻ --}}
        <div class="col-md-8"> {{-- Đặt chiều rộng cột cho nội dung chính --}}
            <div class="card shadow-sm"> {{-- Sử dụng Card component với đổ bóng nhẹ --}}
                <div class="card-header">
                    <h2 class="card-title mb-0">Sửa thông tin sinh viên</h2> {{-- Tiêu đề trong card header --}}
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Bắt buộc cho phương thức PUT để cập nhật --}}

                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên</label> {{-- Thêm form-label và for attribute --}}
                            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="birthday" class="form-label">Ngày sinh</label>
                            <input type="date" name="birthday" id="birthday" class="form-control" value="{{ $student->birthday }}">
                        </div>

                        <div class="mb-3">
                            <label for="avatar" class="form-label">Ảnh đại diện</label>
                            <input type="file" name="avatar" id="avatar" class="form-control mb-2"> {{-- Thêm margin-bottom cho input file --}}
                            @if($student->avatar)
                                <div class="mt-2"> {{-- Thêm margin-top cho hình ảnh --}}
                                    <img src="{{ asset('storage/'.$student->avatar) }}" alt="Ảnh đại diện hiện tại" class="img-thumbnail" width="100" height="100" style="object-fit:cover;">
                                    <small class="text-muted d-block mt-1">Ảnh đại diện hiện tại</small>
                                </div>
                            @else
                                <small class="text-muted d-block mt-1">Chưa có ảnh đại diện nào được tải lên.</small>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end"> {{-- Căn chỉnh các nút về phía bên phải --}}
                            <button type="submit" class="btn btn-primary me-2">Cập nhật</button> {{-- Thêm margin-end --}}
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection