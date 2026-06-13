@props([
    'name',
    'label',
    'type' => 'text',
    'placeholder' => ''
])

<div style="margin-bottom: 15px;">
    <label for="{{ $name }}" style="display: block; margin-bottom: 5px; color: #0b2d23; font-weight: bold;">
        {{ $label }}
    </label>
    
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        placeholder="{{ $placeholder }}"
        style="width: 100%; padding: 10px; border: 1px solid #6ee7b7; border-radius: 8px; box-sizing: border-box;"
    >
</div>