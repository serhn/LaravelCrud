@extends('layouts.app')
@section('title', $name)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    @if(isset($row->id))
    <h1 class="h2">Редактирование</h1>
    @else
    <h1 class="h2">Создание</h1>
    @endif
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

        @include("crud.inc.buttons")

    </div>
</div>
<form id="editRow" action="{{isset($row->id)?route($route.".update",$row->id):route($route.".store")}}" method="POST">
    @if(isset($row->id))
    {{ method_field('PUT') }}

    @endif
    @foreach ($tab as $key=>$item)
    @include('crud.fields.'.$item['type'])
    @endforeach
    {{ csrf_field() }}
</form>
@if(isset($row->id))
<form id="destroy" action="{{route($route.".destroy",$row->id)}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>
@endif
<div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-top">
        <div class="mb-md-0 mt-2">
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
    
            @include("crud.inc.buttons")
    
        </div>
    </div>
@endsection
@include('crud.inc.scripts')