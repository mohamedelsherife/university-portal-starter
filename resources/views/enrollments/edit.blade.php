{{--
    YOUR TASK (W10):  edit an enrollment (for example, to add a final grade).

    The controller passes in:
        $enrollment      — an App\DTOs\EnrollmentDTO (getters listed in enrollments/index)
        $studentOptions  — an array of [id => name]
        $courseOptions   — an array of [id => "CODE — Title"]

    Submit with:
        method="POST" + @csrf + @method('PUT')
        action="{{ route('enrollments.update', $enrollment->getId()) }}"

    Pre-select the current student ($enrollment->getStudentId()) and course
    ($enrollment->getCourseId()), and pre-fill the grade ($enrollment->getGrade()).

    Validated fields:  student_id, course_id, grade

    TODO: build the form here.
--}}

@extends('layouts.app')

@section('page-title', 'Edit Enrollment')

@section('content')
@if ($errors->any())
    <x-alert type="error">
        {{ $errors->first() }}
    </x-alert>
@endif

    <x-button type="back" :href="route('enrollments.index')" />

    <x-card title="Edit Professor">
        <x-form action="{{ route('enrollments.update', $enrollment->getId()) }}" method="POST">
            @csrf
            @method('PUT')

            <x-form-select
                name="student_id"
                label="student ID"
                :options="$studentOptions"
                placeholder="Select Student ID"
                :value="$enrollment->getStudentId()"
                required
            />


            <x-form-select
                name="course_id"
                label="Course ID"
                :options="$courseOptions"
                placeholder="Select Course ID"
                :value="$enrollment->getCourseId()"
                required
            />

                <x-form-input
                name="grade"
                label="Student Grade"
                type="text"
                placeholder="e.g. A+"
                :value="$enrollment->getGrade()"
            />



            <x-button type="submit">Update Enrollment</x-button>
        </x-form>
    </x-card>
@endsection