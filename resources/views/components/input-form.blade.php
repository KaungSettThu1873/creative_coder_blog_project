@props(['name', 'type' => 'text' , 'value' => ''])

<div class="mb-2">
    <label class="d-block">{{ucwords($name)}}</label>
    <input type="{{$type}}" name="{{$name}}" class="form-control" value="{{ old($name,$value) }}" />
    <x-error error="{{$name}}" />
</div>
