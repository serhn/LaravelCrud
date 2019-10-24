@extends('layouts.app')
@section('title', $name)

@section('container')

<h2 class="mt-2"></h2> 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
  <h1 class="h2">{{$name}}</h1>
  <div class="mb-2 mb-md-0">
    {{-- border-bottom
    <div class="btn-group mr-2">
      <button class="btn btn-sm btn-outline-secondary">Share</button>
      <button class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
      <span data-feather="calendar"></span>
      This week
    </button>
    --}}
    <a class="btn btn-outline-primary" href="{{route($route.".create")}}" role="button" aria-pressed="false"><i
        data-feather="plus"></i></a>
  </div>
</div>
@if(count($collection))



<table class="table table-striped">

  <thead class="bg-primary">
    <tr>
      @foreach ($tab as $col)
      <th class="text-white-50" scope="col">{{$col['name']}}</th>
      @endforeach
     
    </tr>
  </thead>
  <tbody>
    @foreach ($collection as $item)
    <tr data-edit="{{route($route.".edit",$item['id'])}}" {{--data-id="{{$item['id']}}" --}} onclick="editRow(this)">
      @foreach ($tab as $key=>$col)
      <td>{{$item->$key}}</th>
        @endforeach
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@endsection
<script>
  //svar route="{{}}"
  function editRow(e){
    //alert(e.dataset.id)
    document.location.href=e.dataset.edit;
  }
  
</script>