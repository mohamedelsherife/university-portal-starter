{{--
    YOUR TASK (W10):  form to create a new professor.

    The controller passes in:
        $departmentOptions  — an array of [id => name] for a dropdown

    Submit with:
        method="POST"  action="{{ route('professors.store') }}"  @csrf

    Validated fields (use these as input name=""):
        name          (required)
        email         (required, must be an email)
        department_id (optional)

    TODO: build the form here.
--}}

@extends('layouts.app')

@section('your-title', 'Create Professor')

@section('content')

    <x-button type="back" :href="route('professors.index')" />
    <x-card title="Create New Professor">
        <x-form action="{{ route('professors.store') }}" method="POST">
            @csrf

            <x-form-input
                name="name"
                label="Professor Name"
                type="text"
                placeholder="e.g. Dr. Layla Hassan"
                required
            />

            <x-form-input
                name="email"
                label="Professor email"
                type="email"
                placeholder="e.g. first_name.last_name.id@faculty.uni.edu"
                required
            />

            <x-form-select
                name="department_id"
                label="Department"
                :options="$departmentOptions"
                placeholder="Select Department"
            />

            <x-button type="submit">Save Professor</x-button>
        </x-form>
    </x-card>
@endsection