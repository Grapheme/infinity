@extends(Helper::layout())
@section('style')

@stop

@section('content')
{{ $content }}
<section class="top-bg">
    <header>
        <h2>
            20 автомобилей<br>
            по себестоимости!
        </h2>

        <div class="desc">
            Предложение действует на автомобили<br>
            в наличии до 30.06
        </div>
    </header>
    <img src="theme/img/offer/bg.jpg" alt="">
</section>
<section class="buy-offer">
    <header>
        <h2>Предложение о покупке</h2>

        <div class="desc">
            Внимание! Стартует беспрецедентная акция - 20 автомобилей по себестоимости*. Подробности<br>
            при встрече. В настоящее время бренд прокладывает себе путь через европейские рынки.<br>
            С момента своего основания, компания невероятно расширилась, и в настоящее время включает<br>
            в себя 230 дилеров в 15 странах мира. Ее деятельность выросла в геометрической прогрессии,<br>
            растянувшись от Мексики до России, и от Украины до Китая и Тайваня.
        </div>
    </header>
    <section class="buy-suboffer">
        <h2>Другие интересные предложения</h2>
        <ul class="sub-offers-ul">
            <li class="sub-offers-li">
                <div class="sub-offers-li-head"
                     style="background: url(theme/img/offer/offers/01.jpg) no-repeat 0 0 / cover;">
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
                <div class="sub-offers-li-head"
                     style="background: url(theme/img/offer/offers/02.jpg) no-repeat 0 0 / cover;">
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
                <div class="sub-offers-li-head"
                     style="background: url(theme/img/offer/offers/03.jpg) no-repeat 0 0 / cover;">
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