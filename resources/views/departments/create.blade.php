{{--
    YOUR TASK (W10):  form to create a new department.
--}}

@extends('layouts.app')

@section('your-title', 'Create Department')

@section('content')

<x-button type="back" :href="route('departments.index')" />

<x-card title="Create New Department">
    <x-form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <x-form-input
            name="name"
            label="Department Name"
            type="text"
            placeholder="e.g. Computer Science"
            required
        />

        <x-button type="submit">
            Save Department
        </x-button>

    </x-form>
</x-card>

@endsection