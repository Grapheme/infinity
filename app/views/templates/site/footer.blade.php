<?php
    $footer_models = ProductCategory::orderby('title')->with(array('product'=>function($query_product){
        $query_product->where('publication',1);
        $query_product->where('in_menu',1);
        $query_product->with(array('meta'=>function($query_product_meta){
            $query_product_meta->orderBy('title');
        }));
    }))->get();
?>
<footer class="main-footer">
    <div class="wrapper">
        <div class="footer-top">
            <div class="footer-left">
                <div class="footer-block">
                    <div class="title">Модели</div>
                    <ul class="footer-ul">
                @foreach($footer_models as $product_category)
                    @foreach($product_category->product as $product)
                        <li class="option"><a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url) }}">{{ $product->meta->first()->short_title  }}</a>
                    @endforeach
                @endforeach
                    </ul>
                </div>
                <div class="footer-block">
                    <div class="title">О компании</div>
                    <ul class="footer-ul">
                        <li class="option"><a href="{{ link::to() }}">Лица компании</a>
                        <li class="option"><a href="{{ link::to() }}">Вакансии</a>
                        <li class="option"><a href="{{ link::to('news') }}">Новости</a>
                        <li class="option"><a href="{{ link::to() }}">Клуб</a>
                        <li class="option"><a href="{{ link::to('history') }}">История</a>
                        <li class="option"><a href="{{ link::to() }}">Контакты</a>
                    </ul>
                </div>
                <div class="footer-block">
                    <div class="title">Услуги</div>
                    <ul class="footer-ul">
                        <li class="option"><a href="{{ link::to() }}">Гарантия</a>
                        <li class="option"><a href="{{ link::to() }}">Программы ТО</a>
                        <li class="option"><a href="{{ link::to() }}">Аксессуары</a>
                    </ul>
                </div>
                <div class="footer-block">
                    <div class="title">Сервис и запчасти</div>
                    <ul class="footer-ul">
                        <li class="option"><a href="{{ link::to() }}">Гарантия</a>
                        <li class="option"><a href="{{ link::to() }}">Программы ТО</a>
                        <li class="option"><a href="{{ link::to() }}">Запчасти</a>
                        <li class="option"><a href="{{ link::to() }}">Аксессуары</a>
                    </ul>
                </div>
            </div>
            <div class="footer-right">
                <adress class="contact-block">
                    346715, г. Ростовская обл.,<br>
                    Аксайский р-н, п. Янтарный,<br>
                    Новочеркасское шоссе, 16В
                </adress>
                <div class="contact-block">
                    <a href="tel:+78632928892" class="contact-link">+7 863-292-88-92</a><br>
                    <a href="tel:+78633050500" class="contact-link">+7 863 305-05-00</a>
                </div>
                <div class="soc-icons">
                    <a href="{{ link::to() }}" class="soc-link icon-fb"></a>
                    <a href="{{ link::to() }}" class="soc-link icon-vk"></a>
                    <a href="{{ link::to() }}" class="soc-link icon-in"></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="footer-bottom">
            <span>© 2014 Copyright GEDON Group</span>
            <span class="fl-r">сделано в <a href="http://grapheme.ru" target="_blank">ГРАФЕМА</a></span>
        </div>
    </div>
</footer>