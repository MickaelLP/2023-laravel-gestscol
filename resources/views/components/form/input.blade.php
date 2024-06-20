@props([
    'name',
    'placeholder' => null,
    'label' =>null,
    'type' => 'text',
    'value' => null
])

@php
    $field_id = $name . '-' . Str::uuid();
@endphp

{{-- @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif --}}

@if ($label)
    <label class="block" for="{{ $field_id }}">{{ $label }}</label>
@endif

<input class="py-2 px-2 rounded-md my-2" id="{{ $field_id }}" type="{{ $type }}" @if ($placeholder) placeholder="{{ $placeholder }}" @endif name="{{ $name }}" value="{{ old($name, $value) }}">
@error('name')  
    <span class="text-red-500 block">{{ $message }}</span>
@enderror