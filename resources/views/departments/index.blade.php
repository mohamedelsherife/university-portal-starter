{{--
    YOUR TASK (W10 + W13):  list every department.

    The controller passes in:
        $departments  — an array of App\DTOs\DepartmentDTO

    Each DepartmentDTO gives you:  getId(), getName()

    Build:
        - @extends('layouts.app') with a @section('content')
        - loop the array with @foreach and show each department (a table works well)
        - an "Edit" link   -> route('departments.edit', $department->getId())
        - a "Delete" button: a <form> with method="POST" + @csrf + @method('DELETE'),
              action -> route('departments.destroy', $department->getId())
        - a "New Department" link -> route('departments.create')

    TODO: build the view here.
--}}

@extends('layouts.app')

@section('your-title', 'university Department')

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


    <h1 class="page-title">Departments</h1>

    <x-card>
        <div class="toolbar">
            <x-search-bar target=".dept-row" placeholder="Search by name..." />
            <x-button type="create" :href="route('departments.create')">Department</x-button>
        </div>
    </x-card>

    <x-table>
        <x-slot:thead>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </x-slot:thead>

        @foreach ($departments as $department)
            <tr class="dept-row">
                <td>{{ $department->getId() }}</td>
                <td>{{ $department->getName() }}</td>
                <td>
                    <x-button type="edit" :href="route('departments.edit', $department->getId())" />
                    <x-button type="delete" :href="route('departments.destroy', $department->getId())" />
                </td>
            </tr>
        @endforeach
    </x-table>
@endsection
