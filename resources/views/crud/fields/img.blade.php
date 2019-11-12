<div class="form-group row">
    <label for="{{$key}}" class="col-sm-2 col-form-label">{{$item["name"]}}</label>
    <div class="col-sm-10">
        <img src="{{$item['path']}}{{$row->$key}}">
    </div>
</div>