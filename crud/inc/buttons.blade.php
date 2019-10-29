<a class="btn btn-outline-primary" href="{{route($route.".index")}}" role="button" aria-pressed="false"><i
                class="fas fa-list"></i></a>
@if(isset($row->id))
@if(preg_match("/\.show$/",\Request::route()->getName()))
<a class="btn btn-outline-dark" href="{{route($route.".edit",$row->id)}}" role="button" aria-pressed="false"><i
                class="fas fa-edit"></i></a>
@else
<a class="btn btn-outline-dark" href="{{route($route.".show",$row->id)}}" role="button" aria-pressed="false"><i
                class="fas fa-eye"></i></a>
@endif
<a onclick="return deleteRow();" class="btn btn-outline-danger" href="" role="button" aria-pressed="false"><i
                class="fas fa-trash"></i></a>

@endif
@if(preg_match("/\.edit$/",\Request::route()->getName()))

<a onclick="return sendRow();" class="btn btn-outline-success" href="" role="button" aria-pressed="false"><i
                class="fas fa-save"></i></a>
@endif