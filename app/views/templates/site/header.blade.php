<?php
    $header_models = ProductCategory::orderby('title')->with(array('product'=>function($query_product){
        $query_product->where('publication',1);
        $query_product->where('in_menu',1);
        $query_product->with(array('meta'=>function($query_product_meta){
            $query_product_meta->orderBy('title');
        }));
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
                <li class="option"><a href="{{ link::to('auto') }}">Автомобили</a>
                <li class="option"><a href="{{ link::to('accessories') }}">Сервисы и запчасти</a>
                <li class="option"><a href="{{ link::to('offers') }}">Спецпредложения</a>
                <li class="option"><a href="{{ link::to('services') }}">Услуги</a>
            </ul>
        </nav>
        <div class="head-models">
        @foreach($header_models as $model)
            <div class="model">
                <div class="title">{{ $model->title }}</div>
                <div class="items">
                @foreach($model->product as $product)
                    <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url) }}">{{ $product->meta->first()->short_title  }}</a>
                @endforeach
                </div>
            </div>
        @endforeach
            <div class="model">
                <div class="title">&nbsp;</div>
                <div class="items">
                    <a href="{{ link::to('catalog') }}">Все модели</a>
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