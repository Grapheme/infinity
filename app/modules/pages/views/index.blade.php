@extends(Helper::layout())
@section('style')

@stop

@section('content')
@include('channels/views/index-slider')
{{ $content }}
@stop
@section('scripts')

@stop