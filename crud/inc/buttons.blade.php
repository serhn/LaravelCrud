<a class="btn btn-outline-primary" href="{{route($route.".index")}}" role="button" aria-pressed="false"><i
        data-feather="arrow-left"></i></a>
@if(isset($row->id))
@if(preg_match("/\.show$/",\Request::route()->getName()))
<a class="btn btn-outline-dark" href="{{route($route.".edit",$row->id)}}" role="button" aria-pressed="false"><i
        data-feather="edit"></i></a>
@else
<a class="btn btn-outline-dark" href="{{route($route.".show",$row->id)}}" role="button" aria-pressed="false"><i
    data-feather="eye"></i></a>
@endif
<a onclick="return deleteRow();" class="btn btn-outline-danger" href="" role="button" aria-pressed="false"><i
        data-feather="delete"></i></a>

@endif
<a onclick="return sendRow();" class="btn btn-outline-success" href="" role="button" aria-pressed="false"><i
        data-feather="save"></i></a>