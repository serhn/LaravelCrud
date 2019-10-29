<div class="form-group row">
    <label for="{{$key}}" class="col-sm-2 col-form-label">{{$item["name"]}}</label>
    <div class="col-sm-10">
        <select class="form-control" name="{{$key}}" id="{{$key}}">
            @foreach ($item["options"] as $keyOption=>$option)
            <option {{($keyOption==@$row->$key)?"selected":""}} value="{{$keyOption}}">{{$option}}</option>
            @endforeach
        </select>
    </div>
</div>