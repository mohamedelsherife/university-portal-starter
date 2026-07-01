{{--
    YOUR TASK (W10):  form to edit an existing department.

    The controller passes in:
        $department  — an App\DTOs\DepartmentDTO  (getId(), getName())

    Submit the form with:
        method="POST" + @csrf + @method('PUT')
        action="{{ route('departments.update', $department->getId()) }}"

    Pre-fill the input with the current value: $department->getName()
    Validated fields:  name (required)

    TODO: build the form here.
--}}

@extends('layouts.app')

@section('your-title', 'Edit Department')

@section('content')
    @if ($errors->any())
    <x-alert type="error">
        {{ $errors->first() }}
    </x-alert>
@endif

    <x-button type="back" :href="route('departments.index')" />

    <x-card title="Edit Department">
        <x-form action="{{ route('departments.update', $department->getId()) }}" method="POST">
            @csrf
            @method('PUT')

            <x-form-input
                name="name"
                label="Department Name"
                type="text"
                placeholder="e.g. Computer Science"
                :value="$department->getName()"
                required
            />

            <x-button type="submit">Update Department</x-button>
        </x-form>
    </x-card>
@endsection