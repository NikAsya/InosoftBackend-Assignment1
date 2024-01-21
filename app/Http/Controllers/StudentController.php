<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use App\Models\SubjectModel;
use App\Models\GradeModel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class StudentController extends Controller
{
    public function index(Request $request)
    {
        $classFilter = $request->input('class'); // Get the class filter from the request

        $query = StudentModel::query();

        // Apply class filter if provided
        if ($classFilter) {
            $query->where('class', $classFilter);
        }

        $students = $query->get();

        return view('students.index', compact('students', 'classFilter'));
    }

    public function show($id)
    {
        $student = StudentModel::findOrFail($id);
        $subjects = SubjectModel::all(); // Assuming you are retrieving all subjects

        return view('students.show', compact('student', 'subjects'));
    }

    public function storeGrades(Request $request, $studentId)
    {
        // Validate the incoming request data
        $request->validate([
            'subject' => 'required|string',
            'exercises' => 'required|integer',
            'weekly_exams' => 'required|integer',
            'mid_semester_exam' => 'required|integer',
            'end_semester_exam' => 'required|integer',
        ]);

        // Find the student by ID
        $student = StudentModel::findOrFail($studentId);

        // Check if the subject already exists
        $subject = SubjectModel::firstOrCreate(['name' => $request->input('subject')]);

        // Create a new set of grades for the student
        $grades = new GradeModel([
            'subject' => $subject->name,
            'exercises' => $request->input('exercises'),
            'weekly_exams' => $request->input('weekly_exams'),
            'mid_semester_exam' => $request->input('mid_semester_exam'),
            'end_semester_exam' => $request->input('end_semester_exam'),
        ]);

        // Associate the grades with the student
        $student->grades()->save($grades);

        return response()->json([
            'message' => 'Grades stored successfully',
            'grades' => $grades,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Implement your logic to update a student
    }

    public function filter(Request $request)
    {
        $classFilter = $request->input('class');
        $students = ($classFilter)
            ? StudentModel::whereHas('studentClass', function ($query) use ($classFilter) {
                $query->where('class_name', $classFilter);
            })->get()
            : StudentModel::all();

        return view('students.index', compact('students'));
    }

    public function showAllStudents()
    {
        $students = StudentModel::all();

        return response()->json([
            'students' => $students,
        ]);
    }

    public function showWithGrades($studentId)
    {
        $student = StudentModel::with('grades')->findOrFail($studentId);

        return response()->json([
            'student' => $student,
        ]);
    }

    public function showCalculatedAverages($studentId): JsonResponse
    {
        $student = StudentModel::with('grades')->findOrFail($studentId);

        $averages = $student->grades->map(function ($grade) {
            return [
                'subject' => $grade->subject,
                'average_grade' => $grade->calculateAverage(),
            ];
        });

        return response()->json(['averages' => $averages]);
    }

    //calculate grade
    public function calculateAverageGrade($studentId, $subject)
    {
        $grades = GradeModel::where('student_id', $studentId)
            ->where('subject', $subject)
            ->first();

        if (!$grades) {
            return response()->json(['error' => 'Grades not found for the specified subject'], 404);
        }

        $exercises = $grades->exercises;
        $weeklyExams = $grades->weekly_exams;
        $midSemesterExam = $grades->mid_semester_exam;
        $endSemesterExam = $grades->end_semester_exam;

        // Calculate average grade based on the given weights
        $averageGrade = 0.15 * $exercises + 0.20 * $weeklyExams + 0.25 * $midSemesterExam + 0.40 * $endSemesterExam;

        return response()->json([
            'subject' => $subject,
            'average_grade' => $averageGrade,
        ]);
    }


    // Add other methods as needed
}
