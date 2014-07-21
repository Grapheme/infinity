@extends(Helper::layout())
@section('style')

@stop

@section('content')
<div class="slider-container">
    <div class="slider-img">
        <div class="slider-photo" style="background-image: url(theme/img/slide1.jpg);"></div>
    </div>
    <div class="wrapper slider-wrapper">
        <div class="slide-info">
            <div class="title">Добро пожаловать на новую высоту.<br>Приветствуйте infinity QX80</div>
            <div class="text">
                <p>Распологайтесь, пристегните ремни, запустите двигатель и почувствуйте, как невероятная сила словно поднивает Вас над землей.</p>
                <p>Условия за бортом больше не имеют значения. Запас мощности не ограничен. Системы безопасности, комфорта и развлечений активированы. Вас ждет исключительно приятное путешествие.<br>
                    Наслаждайтесь.</p>
            </div>
        </div>
        <ul class="index-nav">
            <li class="option"><a href="{{ link::to() }}">Заказать<br>звонок</a>
            <li class="option"><a href="{{ link::to() }}">Запись<br>на тест-драйв</a>
            <li class="option"><a href="{{ link::to() }}">Запись<br>на сервис</a>
            <li class="option"><a href="{{ link::to() }}">Заказ<br>запчастей</a>
        </ul>
    </div>
    <div class="slider-nav">
        <a href="#" class="thumb" style="background-image: url(theme/img/thumbs/thumb1.jpg)"
           data-img="theme/img/slide1.jpg"></a>
        <a href="#" class="thumb" style="background-image: url(theme/img/thumbs/thumb2.jpg)"
           data-img="theme/img/fx35.jpg"></a>
        <a href="#" class="thumb active" style="background-image: url(theme/img/thumbs/thumb3.jpg)"
           data-img="theme/img/slide1.jpg"></a>
        <a href="#" class="thumb" style="background-image: url(theme/img/thumbs/thumb4.jpg)"
           data-img="theme/img/slide1.jpg"></a>
        <a href="#" class="thumb" style="background-image: url(theme/img/thumbs/thumb5.jpg)"
           data-img="theme/img/slide1.jpg"></a>
    </div>
</div>
{{ $content }}
@stop
@section('scripts')

@stop