<?php
    $channelCategory = ChannelCategory::where('slug','main-page-slider')->first();
    $products_slider = Channel::where('category_id',@$channelCategory->id)->orderBy('title')->with('images')->get();
?>
<div class="slider-container">
    <div class="slider-img"></div>
    <div class="wrapper slider-wrapper">
    @foreach($products_slider as $slide)
        <div class="slide-info">
            <div class="title">{{ $slide->title }}</div>
            <div class="text">
                {{ $slide->short }}
            </div>
        </div>
    @endforeach
        <ul class="index-nav">
            <li class="option"><a href="{{ link::to() }}">Заказать<br>звонок</a>
            <li class="option"><a href="{{ link::to() }}">Запись<br>на тест-драйв</a>
            <li class="option"><a href="{{ link::to() }}">Запись<br>на сервис</a>
            <li class="option"><a href="{{ link::to() }}">Заказ<br>запчастей</a>
        </ul>
    </div>
    <div class="js-slider-nav">
    @foreach($products_slider as $slide)
        @if(File::exists(public_path('uploads/galleries/'.$slide->images->name)))
        <i data-thumb="{{ asset('uploads/galleries/thumbs/'.$slide->images->name) }}" data-img="{{ asset('uploads/galleries/'.$slide->images->name) }}"></i>
        @endif
    @endforeach
    </div>
    <div class="slider-nav-win">
        <ul class="slider-nav"></ul>
    </div>
</div>