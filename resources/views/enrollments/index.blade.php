{{--
    YOUR TASK (W10 + W13):  list every enrollment.

    The controller passes in:
        $enrollments  — an array of App\DTOs\EnrollmentDTO

    Each EnrollmentDTO gives you:
        getId(), getStudentId(), getCourseId(), getGrade(),
        getStudentName(), getCourseTitle(), getCourseCode()

    Show each enrollment in a readable way, e.g.
        "Alice Johnson  —  Web Development (CS305)  —  grade: A"
    Note getGrade() may be null (not graded yet).

    Per row add:
        - an "Edit" link    -> route('enrollments.edit', $enrollment->getId())
        - a "Delete/Drop" <form> (POST + @csrf + @method('DELETE'))
              action -> route('enrollments.destroy', $enrollment->getId())
    Plus a "New Enrollment" link -> route('enrollments.create').

    TODO: build the view here.
--}}

@extends('layouts.app')

@section('your-title', 'university Enrollment')

@section('content')
<h1 class="page-title">Enrollment</h1>
        <x-card>
            <div class="toolbar">
            <x-search-bar target=".enrollment-row" placeholder="Search by name, id, course, grade..." />
            <x-button type="create" :href="route('enrollments.create')">Enrollment</x-button>
            </div>
    </x-card>
        
    

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>Student ID</th>
                <th>Course ID</th>
                <th>Grade</th>
                <th>Student name</th>
                <th>Course Title</th>
                <th>Course Code</th>
                <th>Actions</th>
            </x-slot:thead>

            @foreach ($enrollments as $enrollment)
                <tr class="enrollment-row">
                    <td>{{ $enrollment->getId() }}</td>
                    <td>{{ $enrollment->getStudentId() }}</td>
                    <td>{{ $enrollment->getCourseId() }}</td>
                    <td>
                        {!! $enrollment->getGrade() ?? '<span class="badge border border-danger text-danger">Ungraded</span>' !!}
                    </td>
                    <td>{{ $enrollment->getStudentName() }}</td>
                    <td>{{ $enrollment->getCourseTitle()  }}</td>
                    <td>{{ $enrollment->getCourseCode() }}</td>
                    <td>
                        <x-button
                            type="edit"
                            :href="route('enrollments.edit', $enrollment->getId())" />

                        <x-button
                            type="delete"
                            :href="route('enrollments.destroy', $enrollment->getId())" />
                    </td>
                </tr>
            @endforeach
        </x-table>
@endsection