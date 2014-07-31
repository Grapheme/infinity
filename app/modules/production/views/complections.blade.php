@extends(Helper::layout())

@section('style')
@stop

@section('content')
@include('production/views/accepts/product-menu')
<section class="auto-slider">
    @if(!is_null($product->images))
    <div class="slider-window">
        <div class="wrapper">
            @if(File::exists(public_path('uploads/galleries/'.$product->images->name)))
                 <div class="slider-photo" style="background-image: url({{ asset('uploads/galleries/'.$product->images->name) }});"></div>
            @endif
            <div class="auto-info">
                <div class="title">{{ $product->meta->first()->title }}</div>
                <div class="text">{{ $product->meta->first()->preview }}</div>
                <div class="price">{{ number_format($product->meta->first()->price,0,' ',' ') }} руб</div>
                <div class="text"></div>
                <a href="javascript:void(0);" class="drive-btn">Записаться на тестдрайв</a>
            </div>
        </div>
    </div>
    @endif
@if(!is_null($product->gallery) && $product->gallery->photos->count())
   <ul class="slider-nav">
    @foreach($product->gallery->photos as $image)
         <li class="thumb" style="background-image: url({{ asset('uploads/galleries/thumbs/'.$image->name) }});">
    @endforeach
    </ul>
@endif
</section>
@if($product->complections->count())
<section class="complectations">
    <header class="clearfix">
        <h1>Комплектации и цены</h1>
        <div class="filter">
            <ul class="filter-ul">
                <li class="filter-li"><a href="javascript:void(0);">Описание</a>
                <li class="filter-li"><a href="javascript:void(0);">Динамика</a>
                <li class="filter-li"><a href="javascript:void(0);">Экстерьер</a>
                <li class="filter-li"><a href="javascript:void(0);">Интерьер</a>
            </ul>
        </div>
    </header>
    <ul class="car-list">
    @foreach($product->complections as $complection)
        <li class="car-item">
            <div class="car-head">
                <h3>{{ $complection->title }}</h3>
                <div class="car-price">{{ $complection->price }}</div>
            @if(File::exists(public_path('uploads/galleries/thumbs/'.$complection->images->name)))
                <img class="car-image" src="{{ asset('uploads/galleries/thumbs/'.$complection->images->name) }}" alt="">
            @endif
            </div><!--
         --><div class="car-body">
                <div class="car-links">
                @if(!empty($complection->brochure) && File::exists(public_path($complection->brochure)))
                     <a target="_blank" class="" href="{{ asset($complection->brochure) }}"><span class="icon icon-bricks"></span> Брошюра</a>
                @endif
                    <a class="" href="javascript:void(0);"><span class="icon icon-wheel"></span> Записаться на тест-драйв</a>
                    <a class="" href="javascript:void(0);"><span class="icon icon-page"></span> Подробнее</a>
                </div>
                {{ $complection->description }}
                <hr />
                {{ $complection->dynamics }}
                <hr />
                {{ $complection->exterior }}
                <hr />
                {{ $complection->interior }}
            </div>
        </li>
    @endforeach
    </ul>
</section>
@endif
@stop
@section('scripts')
@stop