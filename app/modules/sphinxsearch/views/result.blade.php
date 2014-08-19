<?php
if (Input::has('query')):
    $result = SphinxsearchController::search(Input::get('query'));
    $totalCount = (int) count($result['channels']) + (int) count($result['products'])+ (int) count($result['accessories']) + (int) count($result['news']) + (int) count($result['pages']);
endif;
?>

<section class="buy-offer used inf-block">
    <header>
        <h1>Результаты поиска</h1>
    </header>
    <div class="cars-filter">
        <input class="search-inp" value="{{ Input::get('query') }}">
        <div class="founded">Найдено результатов: <span>{{ $totalCount }}</span></div>
    </div>
</section>
<section>
    <ul class="search-results">
    @if(!is_null($result['channels']) && count($result['channels']))
        @foreach($result['channels'] as $channel)
        <li>
            <div class="inf-block">
                <a href="#" class="title">
                    Infiniti q70 Цвета
                </a>
                <div class="desc">
                    Вам остается только выбрать маршрут для Вашего путешествия, а мы с удовольствием  подготовим Ваш автомобиль к яркому сезону. Ждём Вас в нашем сервисном центре Инфинити «Гедон Авто-Премиум».
                </div>
            </div>
        @endforeach
    @endif
    </ul>
</section>