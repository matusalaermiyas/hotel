<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="@if(isset($type)){{ $type }}@else{{ 'text' }} @endif"
        name="{{ $id }}" class="form-control"
        value="@if (isset($value)){{ $value }}@endif" required>
</div>
