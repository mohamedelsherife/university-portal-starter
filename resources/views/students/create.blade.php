@extends('layouts.app')


@section('page-title','Create Student')


@section('content')


<x-card title="Create Student">


<x-button 
type="back"
:href="route('students.index')"
/>



<x-form 
action="{{ route('students.store') }}"
method="POST">


@csrf


<x-form-input
name="name"
label="Name"
required
/>


<x-form-input
name="email"
label="Email"
type="email"
required
/>


<x-form-input
name="student_number"
label="Student Number"
/>



<x-form-select

name="department_id"

label="Department"

:options="$departmentOptions"

/>


<x-button type="submit">
Save Student
</x-button>


</x-form>


</x-card>


@endsection