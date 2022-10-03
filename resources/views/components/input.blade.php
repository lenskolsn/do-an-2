<?php
    $name = $attributes['name'];
    $label = $attributes['label'];
    $id = $attributes['id'];
    $value = $attributes['value'] ?? old($name);
    $type = $attributes['type'] ?? 'text';
?>
<div class="form-group mt-2">
    <label class="form-label">{{$label}}</label>
    <input value="{{$value}}" id="{{$id}}" name="{{$name}}" type="{{$type}}" class="form-control @error($name) is-invalid @enderror">
</div>
@error($name)
    <p class="text-danger">{{$message}}</p>
@enderror