@extends(Helper::layout())
@section('style')

@stop

@section('content')
<section class="used-car sect-wrapper">
    <header>
        <h1>{{ $element->channel->first()->title }}</h1>
        <div class="year">{{ $element->channel->first()->year }}</div>
        <div class="price">{{ $element->channel->first()->price }}</div>
    </header>
</section>

@if(!is_null($element->channel->first()->gallery) && $element->channel->first()->gallery->photos->count())
<section class="jcarousel-wrapper">
    <div class="jcarousel">
        <ul><!--
        @foreach($element->channel->first()->gallery->photos as $photo)
            --><li><!--
            --><img src="{{ $photo->full() }}"><!--
        @endforeach
        --></ul>
    </div>
    <a href="#" class="jcarousel-control jcarousel-control-prev"><span class="icon icon-angle-left"></span></a>
    <a href="#" class="jcarousel-control jcarousel-control-next"><span class="icon icon-angle-right"></span></a>
</section>
@endif
<section class="used-car sect-wrapper">
    <div class="used-car-options clearfix">
        <div class="chars">
            <h2>Характеристики</h2>
            {{ $element->channel->first()->short }}
        </div>
        <div class="complectation">
            <h2>
                Комплектация
            </h2>
            <div class="desc">
               {{ $element->channel->first()->desc }}
                <button class="btn small book-auto">
                    <span class="icon icon-lock"></span> Забронировать автомобиль
                </button>
            </div>
        </div>
    </div>
</section>
@stop
@section('scripts')

@stop