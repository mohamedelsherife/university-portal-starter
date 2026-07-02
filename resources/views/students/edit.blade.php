@extends('layouts.app')


@section('page-title','Edit Student')


@section('content')
       @if ($errors->any())
            <x-alert type="error">
                {{ $errors->first() }}
            </x-alert>
        @endif

<x-button 
    type="back"
    :href="route('students.index')"
/>



<x-card title="Edit Student">


<x-form 
    action="{{ route('students.update', $student->getId()) }}"
    method="POST">


@csrf

@method('PUT')



<x-form-input
    name="name"
    label="Name"
    type="text"
    value="{{ $student->getName() }}"
    placeholder="Enter student name"
/>



<x-form-input
    name="email"
    label="Email"
    type="email"
    value="{{ $student->getEmail() }}"
    placeholder="Enter student email"
/>



<x-form-input
    name="student_number"
    label="Student Number"
    type="text"
    value="{{ $student->getStudentNumber() }}"
    placeholder="Enter student number"
/>



<x-form-select
    name="department_id"
    label="Department"
    :options="$departmentOptions"
    value="{{ $student->getDepartmentId() }}"
    placeholder="Select Department"
/>



<x-button type="submit">
Update Student
</x-button>



</x-form>


</x-card>


@endsection