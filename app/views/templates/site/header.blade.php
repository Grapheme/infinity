<?php
    $header_models = ProductCategory::orderby('id')->with(array('product'=>function($query_product){
        $query_product->where('publication',1);
        $query_product->with(array('meta'=>function($query_product_meta){
            $query_product_meta->orderBy('title');
        }));
        $query_product->with('images');
        $query_product->with('menu_image');
    }))->get();
?>

<header class="main-header{{ Request::is('/') ? '' : ' static-header' }}">
    @if(!Request::is('/'))
    <a href="{{ link::to() }}" class="logo"></a>
    @else
    <div class="logo"></div>
    @endif
    <div class="header-cont">
        <nav class="main-nav">
            <ul class="list-unstyled">
                <li class="option"><a href="{{ link::to('about') }}">О компании</a>
                <li class="option"><a href="{{ link::to('cars') }}">Автомобили</a>
                <li class="option"><a href="{{ link::to('reserve-parts') }}">Сервисы и запчасти</a>
                <li class="option"><a href="{{ link::to('offers') }}">Спецпредложения</a>
                <li class="option"><a href="{{ link::to('services') }}">Услуги</a>
            </ul>
        </nav>
        <div class="head-models">
        @foreach($header_models as $product_category)
            @if($product_category->product->count())
            <div class="model">
                <div class="title">{{ $product_category->title }}</div>
                <div class="items">
                @foreach($product_category->product as $product)
                    @if($product->in_menu == 1)
                    <a class="js-tooltip" data-tooltip="model-{{ $product->id }}" href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url) }}">{{ $product->meta->first()->short_title  }}</a>
                    @endif
                @endforeach
                </div>
            </div>
            @endif
        @endforeach
            <div class="model">
                <div class="title">&nbsp;</div>
                <div class="items">
                    <a class="js-tooltip" data-tooltip="all" href="{{ link::to('catalog') }}">Все модели</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-right">
        <div class="search">
            {{ Form::open(array('url'=>link::to('search/request'),'method'=>'post')) }}
            <input type="text" placeholder="Поиск" name="search_request" class="search-input" value="{{ Input::get('query') }}">
            <button type="submit" class="search-btn"></button>
            {{ Form::close() }}
        </div>
        <a href="javascript:void(0);" class="gedon-link"></a>
    </div>
</header>

@if($header_models->count())
<div class="tooltip-cont">
@foreach($header_models as $product_category)
    @foreach($product_category->product as $product)
    <div class="car-tooltip js-tooltip-block" data-tooltip="model-{{ $product->id }}">
        <i class="tool-triangle"></i>
        <div class="left-block">
            <ul class="car-ul js-smartabs">
                <li>
                    <div class="car-photo" style="background-image: url(theme/img/tooltip_car_min.png)"></div>
                    <div class="car-name">Q60 CUPE</div>

                <li>
                    <div class="car-photo" style="background-image: url(theme/img/tooltip_car_min.png)"></div>
                    <div class="car-name">Q60 CUPE</div>
            </ul>
        </div><!--
        --><div class="main-blocks">
            @if(!is_null($product->menu_image) && File::exists(public_path('uploads/galleries/'.$product->menu_image->name)))
               <div class="main-block" style="background-image: url({{ asset('uploads/galleries/'.$product->menu_image->name) }})">
            @else
                <div class="main-block">
            @endif
                <div class="car-name">{{ $product->meta->first()->title }}</div>
                {{ $product->meta->first()->preview }}
                <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url) }}" class="car-link"><span class="icon icon-page"></span>Подробнее</a>
                <div class="car-btns">
                    <a href="javascript:void(0);" class="drive-btn"><span class="icon icon-wheel"></span>Записться на тестдрайв</a>
                    @if(!empty($product->brochure) && File::exists(public_path($product->brochure)))
                    <a class="drive-btn" target="_blank" href="{{ asset($product->brochure) }}"><span class="icon icon-bricks"></span>Брошюра</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endforeach
    <div class="cars-tooltip js-tooltip-block" data-tooltip="all">
        <div class="tool-triangle"></div>
        @foreach($header_models as $product_category)
            @if($product_category->product->count())
            <div class="car-block">
                <div class="car-type">{{ $product_category->title }}</div>
                <ul class="cars-ul">
                 @foreach($product_category->product as $product)
                    <li>
                        <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url) }}" class="full-a"></a>
                    @if(!is_null($product->menu_image) && File::exists(public_path('uploads/galleries/thumbs/'.$product->menu_image->name)))
                        <div class="car-photo" style="background-image: url({{ asset('uploads/galleries/thumbs/'.$product->menu_image->name) }});"></div>
                    @endif
                        <div class="car-name">{{ $product->meta->first()->title }}</div>
                 @endforeach
                </ul>
            </div>
            @endif
        @endforeach
    </div>
</div>
@endif