@extends('layouts.app')

@section('page-title','Edit Course')

@section('content')
    @if ($errors->any())
    <x-alert type="error">
        {{ $errors->first() }}
    </x-alert>
@endif
<x-button
type="back"
:href="route('courses.index')"
/>

<x-card title="Edit Course">

<x-form
action="{{ route('courses.update', $course->getId()) }}"
method="POST">

@csrf
@method('PUT')

<x-form-input
name="title"
label="Course Title"
placeholder="e.g. Database Systems"
:value="$course->getTitle()"
required
/>

<x-form-input
name="course_code"
label="Course Code"
placeholder="e.g. IT205"
:value="$course->getCourseCode()"
required
/>

<x-form-input
name="credit_hours"
label="Credit Hours"
type="number"
placeholder="e.g. 3"
:value="$course->getCreditHours()"
required
/>

<x-form-select
name="department_id"
label="Department"
:options="$departmentOptions"
:value="$course->getDepartmentId()"
placeholder="Select Department"
/>

<x-button type="submit">
Update Course
</x-button>

</x-form>

</x-card>

@endsection

