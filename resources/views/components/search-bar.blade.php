@props([
    'target' => null,      
    'placeholder' => 'Search...',
    'id' => 'searchInput_' . uniqid(),
    'dark' => false,
])

<div class="search-bar-wrapper">
    <input
        type="text"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        class="search-bar-input {{ $dark ? 'search-bar-input--dark' : '' }}"
        {{ $attributes }}
        onkeyup="filterTable_{{ $id }}()"
    >
</div>

<script>
    function filterTable_{{ $id }}() {
        const input = document.getElementById('{{ $id }}').value.toLowerCase();
        const rows = document.querySelectorAll('{{ $target }}');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(input) ? '' : 'none';
        });
    }
</script>