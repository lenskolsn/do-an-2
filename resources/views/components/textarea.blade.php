<?php
    $name = $attributes['name'];
    $label = $attributes['label'] ?? '';
    $value = $attributes['value'] ?? old($name);
?>

<div class="form-floating">
    <textarea name="{{$name}}" class="form-control" style="height: 100px">{{$value}}</textarea>
    <label class="form-label">{{$label}}</label>
</div>
@error($name)
    <p class="text-danger">{{$message}}</p>
@enderror