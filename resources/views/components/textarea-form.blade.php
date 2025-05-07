@props(['name','value' => ''])
<div class="mb-2">
    <label>{{ ucWords($name) }}</label>
    <textarea type="text" class="form-control" row='4' name="{{ $name }}">{{ old($name,$value) }}</textarea>
    <x-error error='{{ $name }}' />
</div>
