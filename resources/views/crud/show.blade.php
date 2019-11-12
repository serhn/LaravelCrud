@extends($layout)
@section('title', $name)

@section('content')
<form action="{{isset($row->id)?route($route.".update",$row->id):route($route.".store")}}" method="POST">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <h1 class="h2"></h1>
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

            @include("crud::inc.buttons")

        </div>
    </div>



    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover">
            {{-- <thead>
                <tr>

                    <td colspan="2">ррр</td>
                </tr>
            </thead>--}}
            <tbody>

                {{--@foreach ($row->toArray() as $key=>$item)--}}
                @php $rowArray=$row->toArray() @endphp
                @foreach ($tab as $key=>$col)
                @if(empty($rowArray[$key]))
                @continue
                @endif
                <tr>
                    <td>{{$col['name']}}</td>
                    @if($col['type']=="select")

                    <td>{{$col['options'][$rowArray[$key]]}}</td>
                    @elseif($col['type']=="img")
                    <td><img height="{{$col['height']}}" width="{{$col['width']}}"
                            src="{{$col['path']}}{{$rowArray[$key]}}"></td>
                    @else
                    <td>{!!$rowArray[$key]!!}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{ csrf_field() }}
</form>
@if(isset($row->id))
<form id="destroy" action="{{route($route.".destroy",$row->id)}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>
@endif
@endsection
@include('crud::inc.scripts')