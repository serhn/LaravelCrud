<div class="form-group row">
    <label for="{{$key}}" class="col-sm-2 col-form-label">{{$item["name"]}}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error($key) is-invalid @enderror" name="{{$key}}" id="{{$key}}"
            value="{{old($key,isset($item->key)?$item->key:null)}}"
        {!!isset($item["maxlength"])?'maxlength="'.$item["maxlength"].'"':''!!}
        {!!isset($item["placeholder"])?'placeholder="'.$item["placeholder"].'"':''!!}>
        @error($key)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>