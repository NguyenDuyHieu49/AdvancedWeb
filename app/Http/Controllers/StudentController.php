<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'birthday' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $path;
        }
        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Thêm sinh viên thành công!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'birthday' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        if ($request->hasFile('avatar')) {
            // Xóa ảnh cũ nếu có
            if ($student->avatar) {
                Storage::disk('public')->delete($student->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $path;
        }
        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Cập nhật sinh viên thành công!');
    }

    public function destroy(Student $student)
    {
        if ($student->avatar) {
            Storage::disk('public')->delete($student->avatar);
        }
        $student->delete();
        return \redirect()->route('students.index')->with('success', 'Xóa sinh viên thành công!');
    }
}