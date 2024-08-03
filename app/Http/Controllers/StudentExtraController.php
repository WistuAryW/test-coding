<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('extracurriculars')->paginate(5);
        return view('admin.students-extra.index', compact('students'));
    }

    public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'name' => 'required|string|max:255',
        'start_year' => 'required|integer',
    ]);

    Extracurricular::create([
        'student_id' => $request->student_id,
        'name' => $request->name,
        'start_year' => $request->start_year,
    ]);

    return redirect()->route('studentsextra.index')->with('success', 'Data siswa berhasil dibuat!');
}

    public function dashboard()
    {
        $totalAdmin = User::count();
        $totalStudent = Student::count();
        $totalExtra = Extracurricular::count();
        return view('admin.dashboard',compact('totalStudent','totalAdmin','totalExtra'));
    }
}
