{{-- @props([
    'href' => null,
    'type' => 'button'
])

@if($href)
    <a href="{{ $href }}" class="custom-btn">
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" class="custom-btn">
        {{ $slot }}
    </button>
@endif --}}

@props([
    'type' => 'regular',
    'href' => null,
    'method' => null,
])
{{-- create button --}}
@if($type === 'create')
    <a href="{{ $href }}" class="btn custome-btn btn-create">
        <i class="fa-solid fa-plus"></i> Create new {{ $slot }}
    </a>

{{-- edit button --}}
@elseif($type === 'edit')
    <a href="{{ $href }}" class="btn custome-btn btn-edit">
        <i class="fa-solid fa-pen-to-square"></i> Edit
    </a>
{{-- delete button --}}
@elseif($type === 'delete')
    <form action="{{ $href }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn custome-btn btn-delete">
            <i class="fa-solid fa-trash-can"></i> Delete
        </button>
    </form>

{{-- regular button --}}
@else
    <button type="button" class="btn custome-btn btn-regular">
        {{ $slot }}
    </button>
@endif
