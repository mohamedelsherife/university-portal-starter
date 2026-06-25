@extends('layouts.app')


@section('page-title','Create Student')


@section('content')


<x-button 
    type="back"
    :href="route('students.index')"
/>



<x-card title="Create Student">


<x-form 
    action="{{ route('students.store') }}"
    method="POST">


@csrf



<x-form-input
    name="name"
    label="Name"
    type="text"
    placeholder="Enter student name"
/>



<x-form-input
    name="email"
    label="Email"
    type="email"
    placeholder="Enter student email"
/>



<x-form-input
    name="student_number"
    label="Student Number"
    type="text"
    placeholder="Enter student number"
/>



<x-form-select
    name="department_id"
    label="Department"
    :options="$departmentOptions"
    placeholder="Select Department"
/>



<x-button type="submit">
    Save Student
</x-button>



</x-form>


</x-card>


@endsection