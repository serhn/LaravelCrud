<div class="form-group row">
    <label for="{{$key}}" class="col-sm-2 col-form-label">{{$item["name"]}}</label>
    <div class="col-sm-10">
         <textarea class="form-control" name="{{$key}}" id="{{$key}}" rows="3" 
         {!!isset($item["maxlength"])?'maxlength="'.$item["maxlength"].'"':''!!}> {!!isset($row->$key)?$row->$key:''!!}</textarea>
    </div>
</div>