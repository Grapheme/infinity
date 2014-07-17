@extends(Helper::layout())

@section('style')
@stop

@section('content')
{{ $content }}
@include('channels/views/documents')
@include('channels/views/publication')
@stop

@section('scripts')
@stop