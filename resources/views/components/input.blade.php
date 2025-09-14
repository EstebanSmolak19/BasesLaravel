<div class="mb-4">
    <label for="{{ $name }}" class="form-label fw-semibold">
        {{ $label }}
    </label>
    <div class="input-group input-group-lg">
        <span class="input-group-text bg-light">
            <i class="bi bi-at text-muted"></i>
        </span>
        <input type="{{ $type }}" 
               class="form-control @error($name) is-invalid @enderror" 
               id="{{ $name }}" 
               name="{{ $name }}" 
               placeholder="{{ $placeholder }}" 
               value="{{ old($name) }}">
    </div>
    @error($name)
        <div class="invalid-feedback">
            <i class="bi bi-exclamation-triangle me-1"></i>{{ $message }}
        </div>
    @enderror
</div>