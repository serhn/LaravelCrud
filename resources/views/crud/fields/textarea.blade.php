<div class="form-group row">
    <label for="{{$key}}" class="col-sm-2 col-form-label">{{$item["name"]}}</label>
    <div class="col-sm-10">
         <textarea class="form-control  @error($key) is-invalid @enderror" name="{{$key}}" id="{{$key}}" rows="3" 
         {!!isset($item["maxlength"])?'maxlength="'.$item["maxlength"].'"':''!!}>{!!old($key,isset($item->key)?$item->key:null)!!}</textarea>
    </div>
    @error($key)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>