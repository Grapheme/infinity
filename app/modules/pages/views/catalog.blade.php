@extends(Helper::layout())

@section('style')
@stop

@section('content')
{{ $content }}
@include('production/views/index')
@stop

@section('scripts')
@stop