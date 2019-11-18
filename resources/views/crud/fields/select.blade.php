<div class="form-group row">
    <label for="{{$key}}" class="col-sm-2 col-form-label">{{$item["name"]}}</label>
    <div class="col-sm-10">
        <select class="form-control  @error($key) is-invalid @enderror" name="{{$key}}" id="{{$key}}">
            @foreach ($item["options"] as $keyOption=>$option)
            <option {{($keyOption==old($key,@$row->$key))?"selected":""}} value="{{$keyOption}}">{{$option}}</option>
            @endforeach
        </select>
        @error($key)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>