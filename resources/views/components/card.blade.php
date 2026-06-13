@props([
    'title' => null,
])

<div class="card shadow-sm mb-4">
    {{-- سيظهر الهيدر فقط إذا قمت بتمرير عنوان --}}
    @if ($title)
        <div class="card-header">
            <h5 class="mb-0">{{ $title }}</h5>
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>
</div>