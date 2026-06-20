{{--
YOUR TASK (W10):  form to edit an existing course.
--}}

@extends('layouts.app')

@section('your-title', 'Edit Course')

@section('content')

<div class="container">
    <h1>Edit Course</h1>

```
<x-button type="back" :href="route('courses.index')" />

<x-card>
    <x-form action="{{ route('courses.update', $course->getId()) }}" method="POST">
        @csrf
        @method('PUT')

        <x-form-input
            name="title"
            label="Course Title"
            type="text"
            :value="$course->getTitle()"
        />

        <x-form-input
            name="course_code"
            label="Course Code"
            type="text"
            :value="$course->getCourseCode()"
        />

        <x-form-input
            name="credit_hours"
            label="Credit Hours"
            type="number"
            :value="$course->getCreditHours()"
        />

        <label class="form-label">Department</label>
        <select name="department_id" class="form-control">
            <option value="">Select Department</option>

            @foreach ($departmentOptions as $id => $name)
                <option value="{{ $id }}"
                    {{ $course->getDepartmentId() == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>

        <br>

        <x-button type="submit">
            Update Course
        </x-button>

    </x-form>
</x-card>
```

</div>
@endsection

