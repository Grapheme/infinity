@extends(Helper::layout())
@section('style')

@stop

@section('content')
{{ $content }}
@include('channels/views/stock-cars')
@stop
@section('scripts')

@stop