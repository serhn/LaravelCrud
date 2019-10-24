@extends('layouts.app')
@section('title', $name)

@section('container')
<form action="{{isset($row->id)?route($route.".update",$row->id):route($route.".store")}}" method="POST">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$name}}</h1>
        <div class="mb-2 mb-md-0">
            {{--
    <div class="btn-group mr-2">
      <button class="btn btn-sm btn-outline-secondary">Share</button>
      <button class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
      <span data-feather="calendar"></span>
      This week
    </button>
    --}}

            <a class="btn btn-outline-primary" href="{{route($route.".index")}}" role="button" aria-pressed="false"><i
                    data-feather="arrow-left"></i></a>
            @if(isset($row->id))
            {{ method_field('PUT') }}
            <a onclick="return deleteRow();" class="btn btn-outline-danger" href="" role="button"
                aria-pressed="false"><i data-feather="delete"></i></a>

            @endif
            <button class="btn btn-outline-success" href="" role="button" aria-pressed="false"><i
                    data-feather="save"></i></button>

        </div>
    </div>
    @foreach ($tab as $key=>$item)
    @include('crud.fields.'.$item['type'])
    @endforeach
</form>
@if(isset($row->id))
<form id="destroy" action="{{route($route.".destroy",$row->id)}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>
@endif
@endsection
<script>
    function deleteRow(){
        if(confirm("Видалити цей запис?"))
    document.getElementById('destroy').submit();
    return false;
    }
</script>