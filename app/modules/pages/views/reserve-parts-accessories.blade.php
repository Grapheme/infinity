@extends(Helper::layout())
@section('style')
    {{ HTML::style('theme/css/sumoselect.css') }}
@stop

@section('content')
{{ $content }}
<section class="accessories sect-wrapper">
    <header>
        <h1>Аксессуары</h1>
    </header>
    <?php
        $products = array();
        if($all_products = Product::with('meta')->get()):
            foreach($all_products as $product):
                $products[$product->id] = $product->meta->first()->title;
            endforeach;
        endif;
        $accessories = ProductAccessory::orderBy('title')->orderBy('price')->with('category')->with('accessibility')->with('images')->with('product')->get();

        Helper::dd($accessories->toArray());
    ?>
@if(count($products))
    <div class="cars-filter">
        <select class="customSelect selectModel">
        @foreach($products as $product_id => $product_title)
            <option value="{{ $product_id }}">{{ $product_title }}</option>
        @endforeach
        </select>
        <div class="founded">
            Найдено результатов: <span>6</span>
        </div>
    </div>
@endif
    <dl class="acc-dl">
        <dt class="acc-dt"><h2>Интерьер</h2></dt>
            <dd class="acc-dd">
                <ul class="acc-ul">
                    <li class="acc-li clearfix">
                        <div class="acc-left" style="background-image: url(https://pp.vk.me/c320724/v320724831/90b2/kJ0ComDcRUQ.jpg);">
                            <a href="#"></a>
                        </div>
                        <div class="acc-right">
                            <h2>
                                <a href="#">Стальная накладка на задний бампер</a>
                            </h2>
                            <div class="desc">
                                Оригинальный аксессуар Infiniti. Защитит лакокрасочное покрытие
                                от царапин и не испортит экстерьер Infiniti.
                            </div>
                            <div class="price">
                                15 000 руб.
                            </div>
                            <div class="availability">
                                в наличии
                            </div>
                        </div>
                    </li>
                    <li class="acc-li clearfix">
                        <div class="acc-left" style="background-image: url(https://pp.vk.me/c320724/v320724831/90b2/kJ0ComDcRUQ.jpg);">
                            <a href="#"></a>
                        </div>
                        <div class="acc-right">
                            <h2>
                                <a href="#">Стальная накладка на задний бампер</a>
                            </h2>
                            <div class="desc">
                                Оригинальный аксессуар Infiniti. Защитит лакокрасочное покрытие
                                от царапин и не испортит экстерьер Infiniti.
                            </div>
                            <div class="price">
                                15 000 руб.
                            </div>
                            <div class="availability">
                                в наличии
                            </div>
                        </div>
                    </li>
                    <li class="acc-li clearfix">
                        <div class="acc-left" style="background-image: url(https://pp.vk.me/c320724/v320724831/90b2/kJ0ComDcRUQ.jpg);">
                            <a href="#"></a>
                        </div>
                        <div class="acc-right">
                            <h2>
                                <a href="#">Стальная накладка на задний бампер</a>
                            </h2>
                            <div class="desc">
                                Оригинальный аксессуар Infiniti. Защитит лакокрасочное покрытие
                                от царапин и не испортит экстерьер Infiniti.
                            </div>
                            <div class="price">
                                15 000 руб.
                            </div>
                            <div class="availability">
                                в наличии
                            </div>
                        </div>
                    </li>
                </ul>
            </dd>
    </dl>
</section>
@stop
@section('scripts')
{{ HTML::script("theme/js/vendor/jquery.sumoselect.min.js") }}
<script>
    $('.customSelect.selectModel').SumoSelect({placeholder: 'Модель'});
</script>
@stop