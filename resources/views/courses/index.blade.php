{{--
    YOUR TASK (W10 + W13):  list every course.
--}}

{{--
    YOUR TASK (W10 + W13):  list every course.
--}}

@extends('layouts.app')

@section('your-title', 'University Courses')

@section('content')
@if (session('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif

    @if (session('error'))
        <x-alert type="error">
            {{ session('error') }}
        </x-alert>
    @endif
<h1 class="page-title">Courses</h1>
<x-card>
    <div class="toolbar">
    <x-search-bar target=".course-row" placeholder="Search by name, code or department..." />
    <x-button type="create" :href="route('courses.create')">Course</x-button>
    </div>
    </x-card>


    <x-table>
        <x-slot:thead>
            <th>ID</th>
            <th>Title</th>
            <th>Course Code</th>
            <th>Credit Hours</th>
            <th>Department</th>
            <th>Actions</th>
        </x-slot:thead>

        @foreach ($courses as $course)
            <tr class="course-row">
                <td>{{ $course->getId() }}</td>
                <td>{{ $course->getTitle() }}</td>
                <td>{{ $course->getCourseCode() }}</td>
                <td>{{ $course->getCreditHours() }}</td>
               <td>
                    {!! $course->getDepartmentName() ?? '<span class="badge border border-danger text-danger">No department</span>' !!}
                </td>
                <td>
                    <x-button type="edit" :href="route('courses.edit', $course->getId())" />
                    <x-button type="delete" :href="route('courses.destroy', $course->getId())" />
                </td>
            </tr>
        @endforeach
    </x-table>


@endsection