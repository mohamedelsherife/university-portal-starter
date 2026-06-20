{{--
    YOUR TASK (W10):  form to create a new course.
--}}

@extends('layouts.app')

@section('your-title', 'Create Course')

@section('content')
<div class="container">
    <h1>Create New Course</h1>

    <x-button type="back" :href="route('courses.index')" />

    <x-card>
        <x-form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <x-form-input
                name="title"
                label="Course Title"
                type="text"
                placeholder="e.g. Database Systems"
            />

            <x-form-input
                name="course_code"
                label="Course Code"
                type="text"
                placeholder="e.g. IT205"
            />

            <x-form-input
                name="credit_hours"
                label="Credit Hours"
                type="number"
                placeholder="3"
            />

            <label class="form-label">Department</label>
            <select name="department_id" class="form-control">
                <option value="">Select Department</option>

                @foreach ($departmentOptions as $id => $name)
                    <option value="{{ $id }}">
                        {{ $name }}
                    </option>
                @endforeach
            </select>

            <br>

            <x-button type="submit">
                Save Course
            </x-button>

        </x-form>
    </x-card>
</div>
@endsection