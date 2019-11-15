@extends($layout)
@section('title', $name)

@section('content')
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
        class="fas fa-plus"></i></a>
  </div>
</div>

@if(count($collection))


<div class="table-responsive">
  <table class="table table-striped table-sm table-hover crud-table">
    <thead>
      <tr>
        @if(count($tab))
        @foreach ($tab as $col)
        @if(isset($col['tab']) && $col['tab']==0)
        @continue
        @endif
        <th>{{$col['name']}}</th>
        @endforeach
        @else
        @foreach ($collection[0]->toArray() as $key=>$itemRow)
        <th>{{$key}}</th>
        @endforeach
        @endif
        <th> - </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($collection as $item)
      <tr data-url="{{route($route.".show",$item['id'])}}" {{--data-id="{{$item['id']}}" --}} onclick="editRow(this)">
        @if(count($tab))
        @foreach ($tab as $key=>$col)
        @if(isset($col['tab']) && $col['tab']==0)
        @continue
        @endif
        @if($col['type']=="select")
        <td>{{$col['options'][$item->$key]}}</td>
        @elseif($col['type']=="img")
        <td><img height="{{$col['height']}}" width="{{$col['width']}}" src="{{$col['path']}}{{$item->$key}}"></td>
        @else
        @if(isset($col['relations']))
        @php $relations=$col['relations'] @endphp
        <td>{!!$item->$relations->$key!!}</td>
        @else
        <td>{!!$item->$key!!}</td>
        @endif
        @endif
        @endforeach
        @else
        @foreach ($collection[0]->toArray() as $key=>$itemRow)
        <td>{!!$item->$key!!}</td>
        @endforeach
        @endif
        <td class="text-right"><a class="btn btn-primary" href="{{route($route.".edit",$item['id'])}}" role="button"
            aria-pressed="false"><i class="fas fa-edit"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{ $collection->links() }}
@endif

@endsection
@section('scripts')
@parent
<script>
  //svar route="{{}}"
    function editRow(e){
      //alert(e.dataset.id)
      document.location.href=e.dataset.url;
    }
    
</script>
@endsection