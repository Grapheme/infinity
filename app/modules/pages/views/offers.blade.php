@extends(Helper::layout())
@section('style')

@stop

@section('content')
{{ $content }}
<section class="buy-offer">
    <section class="buy-suboffer">
        <h1>Спецпредложения</h1>
        <ul class="sub-offers-ul">
            <li class="sub-offers-li">
                <div class="sub-offers-li-head" style="background: url(theme/img/offer/offers/01.jpg) no-repeat 0 0 / cover;">
                    <a href="{{ link::to('offer') }}"></a>
                </div>
                <div class="sub-offers-li-body">
                    <h3 class="sub-offers-li-header">
                        <a href="{{ link::to('offer') }}">
                            INFINITI Q50:
                            СТАНЬ ПЕРВЫМ!
                        </a>
                    </h3>
                    <div class="sub-offers-li-desc">
                        Новая и яркая модель премиум-класса Infiniti
                        Q50 с 2,0-литровым бензиновым двигателем.
                    </div>
                </div>
            <li class="sub-offers-li">
                <div class="sub-offers-li-head" style="background: url(theme/img/offer/offers/02.jpg) no-repeat 0 0 / cover;">
                    <a href="{{ link::to('offer') }}"></a>
                </div>
                <div class="sub-offers-li-body">
                    <h3 class="sub-offers-li-header">
                        <a href="{{ link::to('offer') }}">
                            Первый гибридный
                            Infiniti доступен
                            к заказу!
                        </a>
                    </h3>
                    <div class="sub-offers-li-desc">
                        Infinti QX60 Hybrid уже доступен к заказу
                        в дилерском центре Infiniti Gedon
                        в Ростове-на-Дону!
                    </div>
                </div>
            <li class="sub-offers-li">
                <div class="sub-offers-li-head" style="background: url(theme/img/offer/offers/03.jpg) no-repeat 0 0 / cover;">
                    <a href="{{ link::to('offer') }}"></a>
                </div>
                <div class="sub-offers-li-body">
                    <h3 class="sub-offers-li-header">
                        <a href="{{ link::to('offer') }}">
                            INFINITI QX80
                            ОТ 25 000 РУБ. В МЕСЯЦ
                        </a>
                    </h3>
                    <div class="sub-offers-li-desc">
                        Оцените уникальную систему
                        стабилизации колебаний кузова Infiniti
                        QX80. Ощутите плавность прохождения
                        любых поворотов
                    </div>
                </div>
            <li class="sub-offers-li">
                <div class="sub-offers-li-head" style="background: url(theme/img/offer/offers/01.jpg) no-repeat 0 0 / cover;">
                    <a href="{{ link::to('offer') }}"></a>
                </div>
                <div class="sub-offers-li-body">
                    <h3 class="sub-offers-li-header">
                        <a href="{{ link::to('offer') }}">
                            INFINITI Q50:
                            СТАНЬ ПЕРВЫМ!
                        </a>
                    </h3>
                    <div class="sub-offers-li-desc">
                        Новая и яркая модель премиум-класса Infiniti
                        Q50 с 2,0-литровым бензиновым двигателем.
                    </div>
                </div>
            <li class="sub-offers-li">
                <div class="sub-offers-li-head" style="background: url(theme/img/offer/offers/02.jpg) no-repeat 0 0 / cover;">
                    <a href="{{ link::to('offer') }}"></a>
                </div>
                <div class="sub-offers-li-body">
                    <h3 class="sub-offers-li-header">
                        <a href="{{ link::to('offer') }}">
                            Первый гибридный
                            Infiniti доступен
                            к заказу!
                        </a>
                    </h3>
                    <div class="sub-offers-li-desc">
                        Infinti QX60 Hybrid уже доступен к заказу
                        в дилерском центре Infiniti Gedon
                        в Ростове-на-Дону!
                    </div>
                </div>
            <li class="sub-offers-li">
                <div class="sub-offers-li-head" style="background: url(theme/img/offer/offers/03.jpg) no-repeat 0 0 / cover;">
                    <a href="{{ link::to('offer') }}"></a>
                </div>
                <div class="sub-offers-li-body">
                    <h3 class="sub-offers-li-header">
                        <a href="{{ link::to('offer') }}">
                            INFINITI QX80
                            ОТ 25 000 РУБ. В МЕСЯЦ
                        </a>
                    </h3>
                    <div class="sub-offers-li-desc">
                        Оцените уникальную систему
                        стабилизации колебаний кузова Infiniti
                        QX80. Ощутите плавность прохождения
                        любых поворотов
                    </div>
                </div>
        </ul>
    </section>
</section>
@stop
@section('scripts')

@stop