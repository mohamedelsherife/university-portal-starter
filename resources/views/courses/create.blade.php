{{--
    YOUR TASK (W10):  form to create a new course.

    The controller passes in:
        $departmentOptions  — an array of [id => name] for a dropdown

    Submit with:
        method="POST"  action="{{ route('courses.store') }}"  @csrf

    Validated fields (use these as input name=""):
        title         (required)
        course_code   (required)
        credit_hours  (required, a whole number between 1 and 12)
        department_id (optional)

    TODO: build the form here.
--}}
@extends('layouts.app')

@section('title', 'Add Course')

@section('content')

<div class="container py-4">

```
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        <h4 class="mb-0">Add New Course</h4>
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('courses.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Course Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Course Code</label>
                <input type="text"
                       name="course_code"
                       class="form-control"
                       value="{{ old('course_code') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Credit Hours</label>
                <input type="number"
                       name="credit_hours"
                       class="form-control"
                       min="1"
                       max="12"
                       value="{{ old('credit_hours', 3) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Department</label>

                <select name="department_id" class="form-select">
                    <option value="">Select Department</option>

                    @foreach($departmentOptions as $id => $name)
                        <option value="{{ $id }}">
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <a href="{{ route('courses.index') }}"
               class="btn btn-secondary">
                Back
            </a>

            <button type="submit"
                    class="btn btn-success">
                Save Course
            </button>

        </form>

    </div>
</div>
```

</div>
@endsection
