<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    // GET /api/students - Read all students.
    public function index(): JsonResponse
    {
        return response()->json(Student::orderBy('id')->get());
    }

    // POST /api/students - Create a student.
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'course' => 'required|string|max:50',
            'year_level' => 'nullable|integer|between:1,5',
        ]);

        $student = Student::create($data);

        return response()->json($student, 201);
    }

    // GET /api/students/{student} - Find one student by ID.
    public function show(Student $student): JsonResponse
    {
        return response()->json($student);
    }

    // PUT/PATCH /api/students/{student} - Update student details.
    public function update(Request $request, Student $student): JsonResponse
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'course' => 'sometimes|required|string|max:50',
            'year_level' => 'sometimes|nullable|integer|between:1,5',
        ]);

        $student->update($data);

        return response()->json($student->refresh());
    }

    // DELETE /api/students/{student} - Remove a student.
    public function destroy(Student $student): Response
    {
        $student->delete();

        return response()->noContent();
    }
}
