<div class="form-group row">
    <label for="{{$key}}" class="col-sm-2 col-form-label">{{$item["name"]}}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="{{$key}}" id="{{$key}}" 
        
        {!!isset($row->$key)?'value=""':''!!}
        {!!isset($item["maxlength"])?'maxlength="'.$item["maxlength"].'"':''!!}
        {!!isset($item["placeholder"])?'placeholder="'.$item["placeholder"].'"':''!!}>
    </div>
</div>