<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extracurriculars = Extracurricular::with('student')->paginate(5);
        return view('admin.extracurriculars.index', compact('extracurriculars'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.extracurriculars.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'name' => 'required|string|max:255',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        Extracurricular::create($validated);
        return redirect()->route('extracurriculars.index')->with('success', 'created successfully.');
    }

    public function edit($id)
    {
        $students = Student::all();
        $extracurricular = Extracurricular::find($id);
        return view('admin.extracurriculars.edit', compact('extracurricular', 'students'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'name' => 'required|string|max:255',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $extracurricular = Extracurricular::find($id);

        $extracurricular->student_id = $request->student_id;
        $extracurricular->name = $request->name;
        $extracurricular->start_year = $request->start_year;

        $extracurricular->save();
        return redirect()->route('extracurriculars.index')->with('success', 'updated successfully.');
    }

    function destroy($id) : RedirectResponse {
        $extra = Extracurricular::find($id);
        $extra->delete();
        return redirect()->route('extracurriculars.index')->with('success', 'deleted successfully.');
    }
}
