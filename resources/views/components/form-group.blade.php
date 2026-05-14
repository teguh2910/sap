<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    @if(isset($type) && $type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}" {{ !empty($required) ? 'required' : '' }}>{{ old($name, isset($value) ? $value : '') }}</textarea>
    @else
        <input type="{{ isset($type) ? $type : 'text' }}" name="{{ $name }}" id="{{ $name }}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}" value="{{ old($name, isset($value) ? $value : '') }}" {{ !empty($required) ? 'required' : '' }}>
    @endif
    @if($errors->has($name))
        <span class="invalid-feedback d-block">{{ $errors->first($name) }}</span>
    @endif
</div>
