{{--
    YOUR TASK (W10):  form to edit an existing professor.

    The controller passes in:
        $professor          — an App\DTOs\ProfessorDTO (getters listed in professors/index)
        $departmentOptions  — an array of [id => name]

    Submit with:
        method="POST" + @csrf + @method('PUT')
        action="{{ route('professors.update', $professor->getId()) }}"

    Pre-fill each input from the DTO and pre-select the current department
    ($professor->getDepartmentId()).

    Validated fields:  name, email, department_id

    TODO: build the form here.
--}}

@extends('layouts.app')

@section('page-title', 'Edit Professor')

@section('content')


    <x-button type="back" :href="route('professors.index')" />

    <x-card title="Edit Professor">
        <x-form action="{{ route('professors.update', $professor->getId()) }}" method="POST">
            @csrf
            @method('PUT')

            <x-form-input
                name="name"
                label="Professor Name"
                type="text"
                placeholder="e.g. Dr. Layla Hassan"
                :value="$professor->getName()"
                required
            />

            <x-form-input
                name="email"
                label="Professor email"
                type="email"
                placeholder="e.g. first_name.last_name.id@faculty.uni.edu"
                :value="$professor->getEmail()"
                required
            />

            <x-form-select
                name="department_id"
                label="Department"
                :options="$departmentOptions"
                placeholder="Select Department"
                :value="$professor->getDepartmentId()"
            />

            <x-button type="submit">Update Professor</x-button>
        </x-form>
    </x-card>
@endsection