<div {{ $attributes->merge(['class' => 'form-group']) }}>

    <label for="{{ $id }}">{{ $label }}</label>

    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        id="{{ $id }}"
        @if ($value !== null && $value !== '') value="{{ $value }}"
        @else
            value="{{ old($name) }}" @endif
        {{ $isRequired ? 'required' : '' }} {{ $disabled }}>

    @if ($hintText)
        <small class="form-text text-muted">{{ $hintText }}</small>
    @endif

    @error($name)
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

</div>
