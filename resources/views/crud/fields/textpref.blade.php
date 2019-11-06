<div class="form-group row">
    <label for="{{$key}}" class="col-sm-2 col-form-label">{{$item["name"]}}</label>
    <div class="input-group col-sm-10">
        <div class="input-group-prepend">
            <div class="input-group-text">{{$item["pref"]}}</div>
        </div>
        <input type="text" class="form-control" name="{{$key}}" id="{{$key}}"
            {!!isset($row->$key)?'value="'.htmlspecialchars($row->$key).'"':''!!}
        {!!isset($item["maxlength"])?'maxlength="'.$item["maxlength"].'"':''!!}
        {!!isset($item["placeholder"])?'placeholder="'.$item["placeholder"].'"':''!!}>
    </div>
</div>