@extends(Helper::layout())

@section('style')
@stop

@section('content')
@include('production/views/accepts/product-menu')
 <section class="auto-slider">
    @if($product->colors->count())
    <div class="slider-window">
        <div class="wrapper">
            <div class="colorWrapper">
                <div class="color-head">Подбор цвета</div>
                <div class="color-close">✕</div>
                <div class="color-name"></div>
                <ul class="colors-list">
                @foreach($product->colors as $product_color)
                    <li class="color-item" data-color="{{ $product_color->color }}" data-color-title="{{ $product_color->title }}"></li>
                @endforeach
                </ul>
            </div>
            <a class="drive-btn colorView" href="javascript:void(0);"><span class="icon icon-circle"></span> Выбор цвета</a>
        @foreach($product->colors as $product_color)
            @if(File::exists(public_path('uploads/galleries/'.$product_color->images->name)))
                <div class="slider-photo" style="background-image: url({{ asset('uploads/galleries/'.$product_color->images->name) }});"></div>
            @endif
        @endforeach
            <div class="auto-info">
                <div class="title">Объект желания</div>
                <div class="text">{{ $product->meta->first()->title }}</div>
                <div class="price">{{ number_format($product->meta->first()->price,0,' ',' ') }} руб</div>
                <div class="text">{{ $product->meta->first()->preview }}</div>
                <a href="javascript:void(0);" class="drive-btn js-pop-show" data-popup="test-drive">
                    <span class="icon icon-wheel"></span> Записаться на тестдрайв
                </a>
            </div>
        </div>
    </div>
    @endif
@if(!is_null($product->gallery) && $product->gallery->photos->count())
    <div class="js-slider-nav">
    @foreach($product->gallery->photos as $image)
        <i data-thumb="{{ asset('uploads/galleries/thumbs/'.$image->name) }}" data-img="{{ asset('uploads/galleries/'.$image->name) }}"></i>
    @endforeach
    </div>
    <div class="slider-nav-win">
        <ul class="slider-nav"></ul>
    </div>
@endif
</section>
<section class="model-sect">
    {{ $product->meta->first()->content }}
</section>
@stop
@section('scripts')
@stop