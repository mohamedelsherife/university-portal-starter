{{--
    YOUR TASK (W10 + W13):  list every professor.

    The controller passes in:
        $professors  — an array of App\DTOs\ProfessorDTO

    Each ProfessorDTO gives you:
        getId(), getName(), getEmail(), getDepartmentId(), getDepartmentName()

    Build a table (loop with @foreach) with, per row:
        - an "Edit" link    -> route('professors.edit', $professor->getId())
        - a "Delete" <form> (POST + @csrf + @method('DELETE'))
              action -> route('professors.destroy', $professor->getId())
    Plus a "New Professor" link -> route('professors.create').

    TODO: build the view here.--}}
@extends('layouts.app')

@section('your-title', 'university Professors')

@section('content')


    <x-card>
    <h1>Professors</h1>

    <x-button type="create" :href="route('professors.create')">
        Professor
    </x-button>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department ID</th>
                <th>Department Name</th>
                <th>Actions</th>
            </x-slot:thead>

            @foreach ($professors as $professor)
                <tr>
                    <td>{{ $professor->getId() }}</td>
                    <td>{{ $professor->getName() }}</td>
                    <td>{{ $professor->getEmail() }}</td>

                    <td class="{{ $professor->getDepartmentId() ? '' : 'text-danger fw-bold' }}">
                        {{ $professor->getDepartmentId() ?? '—' }}
                    </td>

                    <td class="{{ $professor->getDepartmentName() ? '' : 'text-danger fw-bold' }}">
                        {{ $professor->getDepartmentName() ?? 'Unassigned' }}
                    </td>

                    <td>
                        <x-button
                            type="edit"
                            :href="route('professors.edit', $professor->getId())" />

                        <x-button
                            type="delete"
                            :href="route('professors.destroy', $professor->getId())" />
                    </td>
                </tr>
            @endforeach

        </x-table>

    </x-card>
@endsection