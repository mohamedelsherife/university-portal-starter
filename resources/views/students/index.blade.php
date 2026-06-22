@extends('layouts.app')

@section('page-title','Students')


@section('content')


<x-card title="Students">


<x-button
type="create"
href="{{ route('students.create') }}">
Student
</x-button>



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


<tr>

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
{{ $student->getDepartmentName() ?? '-' }}
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


</x-card>


@endsection