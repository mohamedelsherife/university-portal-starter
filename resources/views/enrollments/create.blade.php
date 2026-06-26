{{--
    YOUR TASK (W10):  form to enroll a student in a course.

    This is the special one: the form combines data from TWO sources at once
    (a list of students AND a list of courses).

    The controller passes in:
        $studentOptions  — an array of [id => name]            (for a dropdown)
        $courseOptions   — an array of [id => "CODE — Title"]   (for a dropdown)

    Submit with:
        method="POST"  action="{{ route('enrollments.store') }}"  @csrf

    Validated fields (use these as the field name=""):
        student_id  (required)
        course_id   (required)
        grade       (optional)

    Build two <select> dropdowns (one per array) plus a grade text input.

    TODO: build the form here.
--}}

@extends('layouts.app')

@section('your-title', 'Create Enrollment')

@section('content')

    <x-button type="back" :href="route('enrollments.index')" />
    <x-card title="Create New Enrollment">
        <x-form action="{{ route('enrollments.store') }}" method="POST">
            @csrf

            <x-form-select
                name="student_id"
                label="student ID"
                :options="$studentOptions"
                placeholder="Select Student ID"
                required
            />

            <x-form-select
                name="course_id"
                label="Course ID"
                :options="$courseOptions"
                placeholder="Select Course ID"
                required
            />

                <x-form-input
                name="grade"
                label="Student Grade"
                type="text"
                placeholder="e.g. A+"
        
            />

            <x-button type="submit">Save Enrollment</x-button>
        </x-form>
    </x-card>
@endsection