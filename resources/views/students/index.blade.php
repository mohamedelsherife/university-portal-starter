@extends('layouts.app')

@section('page-title','Students')


@section('content')

<h1 class="page-title">Students</h1>
<x-card>

<div class="toolbar">
    <x-search-bar target=".student-row" placeholder="Search by name, email or department..." />

    <x-button
    type="create"
    href="{{ route('students.create') }}">
    Student
    </x-button>
</div>

</x-card>



<x-table>


<x-slot name="thead">

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Student Number</th>
<th>Department</th>
<th>Actions</th>


</x-slot>



@forelse($students as $student)


<tr class="student-row">

<td>
{{ $student->getId() }}
</td>


<td>
{{ $student->getName() }}
</td>


<td>
{{ $student->getEmail() }}
</td>


<td>
{{ $student->getStudentNumber() ?? '-' }}
</td>


<td>

{!! $student->getDepartmentName() ?? '<span class="badge border border-danger text-danger">No Department</span>' !!}

</td>


<td>


<x-button
type="edit"
href="{{ route('students.edit',$student->getId()) }}"
/>


<x-button
type="delete"
href="{{ route('students.destroy',$student->getId()) }}"
/>


</td>


</tr>


@empty


<tr>

<td colspan="6">
No students found
</td>

</tr>


@endforelse



</x-table>




@endsection