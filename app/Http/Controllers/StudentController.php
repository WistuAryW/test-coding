<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'student_number' => 'required|unique:students',
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'nullable|image'
        ]);

        $student = Student::create($request->all());

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $student->update(['photo' => $path]);
        }

        return redirect()->route('students.index')->with('success', 'created successfully.');
    }

    function edit($id): View
    {
        $student = Student::find($id);
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'student_number' => 'required|unique:students,student_number,' . $id,
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'nullable|image'
        ]);

        $student = Student::findOrFail($id);

        // Check if a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }

            // Store new photo
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $path = $photo->storeAs('photos', $filename, 'public');
            $validatedData['photo'] = $path;
        }

        // Fill student data with validated data
        $student->fill($validatedData);
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }


    public function destroy($id)
    {
        $student = Student::find($id);

        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'deleted successfully!');;
    }
}
