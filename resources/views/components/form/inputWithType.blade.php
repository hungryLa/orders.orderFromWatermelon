<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{$title}}</label>
    <input type="{{$type}}" class="form-control" id="{{$name}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{$value}}">
    @error($name)
        <div class="valid-feedback">{{$message}}</div>
    @enderror
</div>
