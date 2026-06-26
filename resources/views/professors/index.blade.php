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
<h1 class="page-title">Professors</h1>
        <x-card>
            <div class="toolbar">
            <x-search-bar target=".professor-row" placeholder="Search by name, email or department..." />
            <x-button type="create" :href="route('professors.create')">Professor</x-button>
            </div>
    </x-card>
        
    

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
                <tr class="professor-row">
                    <td>{{ $professor->getId() }}</td>
                    <td>{{ $professor->getName() }}</td>
                    <td>{{ $professor->getEmail() }}</td>

                    <td>
                        {!! $professor->getDepartmentId() ?? '<span class="badge border border-danger text-danger">Null</span>' !!}
                    </td>



                   <td>
                    {!! $professor->getDepartmentName() ?? '<span class="badge border border-danger text-danger">Unassigned</span>' !!}
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
@endsection