@extends('layouts.app')

@section('content')
<div class="container py-4"> {{-- Thêm padding dọc cho container --}}
    <div class="row justify-content-center"> {{-- Căn giữa nội dung thẻ --}}
        <div class="col-md-7"> {{-- Đặt chiều rộng cột cho nội dung chính, phù hợp cho trang chi tiết --}}
            <div class="card shadow-sm"> {{-- Sử dụng Card component với đổ bóng nhẹ --}}
                <div class="card-header d-flex align-items-center">
                    <h2 class="card-title mb-0 text-primary">Thông tin sinh viên</h2> {{-- Tiêu đề trong card header --}}
                </div>
                <div class="card-body text-center"> {{-- Căn giữa nội dung trong card body --}}
                    @if($student->avatar)
                        <img src="{{ asset('storage/'.$student->avatar) }}"
                             class="rounded-circle border border-primary p-2 mb-3" {{-- Làm ảnh tròn, có viền, padding và margin-bottom --}}
                             style="width: 150px; height: 150px; object-fit: cover;"
                             alt="Ảnh đại diện">
                    @else
                        <div class="text-center mb-3">
                            <span class="d-inline-block p-4 border border-secondary rounded-circle bg-light text-muted" style="width: 150px; height: 150px; line-height: 110px;">
                                <i class="bi bi-person-fill fs-1"></i> {{-- Thêm icon người dùng nếu có Bootstrap Icons --}}
                            </span>
                            <small class="d-block text-muted mt-2">Chưa có ảnh đại diện</small>
                        </div>
                    @endif

                    <h3 class="mb-3">{{ $student->name }}</h3> {{-- Tên sinh viên nổi bật hơn --}}

                    <ul class="list-group list-group-flush mb-4 text-start"> {{-- Dùng list group để hiển thị thông tin chi tiết --}}
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ $student->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Ngày sinh:</strong> {{ $student->birthday }}
                        </li>
                    </ul>

                    <div class="d-flex justify-content-center"> {{-- Căn giữa nút quay lại --}}
                        <a href="{{ route('students.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left me-1"></i> {{-- Thêm icon nếu có Bootstrap Icons --}}
                            Quay lại danh sách
                        </a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">
                            <i class="bi bi-pencil-square me-1"></i> {{-- Thêm icon nếu có Bootstrap Icons --}}
                            Sửa thông tin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection