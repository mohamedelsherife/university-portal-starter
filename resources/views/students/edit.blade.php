@extends('layouts.app')


@section('page-title','Edit Student')


@section('content')


<x-card title="Edit Student">


<x-button

type="back"

:href="route('students.index')"

/>



<x-form

action="{{ route('students.update',$student->getId()) }}"

method="POST">


@csrf

@method('PUT')



<x-form-input

name="name"

label="Name"

:value="$student->getName()"

/>


<x-form-input

name="email"

label="Email"

type="email"

:value="$student->getEmail()"

/>


<x-form-input

name="student_number"

label="Student Number"

:value="$student->getStudentNumber()"

/>



<x-form-select

name="department_id"

label="Department"

:options="$departmentOptions"

:value="$student->getDepartmentId()"

/>



<x-button type="submit">

Update Student

</x-button>



</x-form>



</x-card>


@endsection