<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * CourseController (Student 3).
 */
class CourseController extends Controller
{
    public function __construct(
        private CourseService $courses,
        private DepartmentService $departments,
    ) {}

    public function index()
    {
        return view('courses.index', [
            'courses' => $this->courses->all(),
        ]);
    }

    public function create()
    {
        return view('courses.create', [
            'departmentOptions' => $this->departmentOptions(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'course_code' => ['required', 'string', 'max:20', 'unique:courses,course_code'],
            'credit_hours' => ['required', 'integer', 'min:1', 'max:12'],
            'department_id' => ['nullable', 'integer', 'exists:departments,id'],
        ], [
            'title.required' => 'Course title is required.',
            'title.max' => 'Course title is too long.',
            'course_code.required' => 'Course code is required.',
            'course_code.max' => 'Course code is too long.',
            'course_code.unique' => 'A course with this code already exists, try another',
            'credit_hours.required' => 'Credit hours is required.',
            'credit_hours.integer' => 'Credit hours must be a number.',
            'credit_hours.min' => 'Credit hours must be at least 1.',
            'credit_hours.max' => 'Credit hours cannot exceed 12.',
            'department_id.exists' => 'Selected department does not exist.',
        ]);

        $this->courses->create($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function edit(int $id)
    {
        $course = $this->courses->find($id);
        abort_unless($course, 404);

        return view('courses.edit', [
            'course' => $course,
            'departmentOptions' => $this->departmentOptions(),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'course_code' => ['required', 'string', 'max:20', Rule::unique('courses', 'course_code')->ignore($id)],
            'credit_hours' => ['required', 'integer', 'min:1', 'max:12'],
            'department_id' => ['nullable', 'integer', 'exists:departments,id'],
        ], [
            'title.required' => 'Course title is required.',
            'title.max' => 'Course title is too long.',
            'course_code.required' => 'Course code is required.',
            'course_code.max' => 'Course code is too long.',
            'course_code.unique' => 'A course with this code already exists.',
            'credit_hours.required' => 'Credit hours is required.',
            'credit_hours.integer' => 'Credit hours must be a number.',
            'credit_hours.min' => 'Credit hours must be at least 1.',
            'credit_hours.max' => 'Credit hours cannot exceed 12.',
            'department_id.exists' => 'Selected department does not exist.',
        ]);

        $this->courses->update($id, $data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(int $id)
    {
        $this->courses->delete($id);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }

    /**
     * @return array<int, string>
     */
    private function departmentOptions(): array
    {
        return collect($this->departments->all())
            ->mapWithKeys(fn ($dept) => [$dept->getId() => $dept->getName()])
            ->all();
    }
}