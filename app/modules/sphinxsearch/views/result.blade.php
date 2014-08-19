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
                <a href="{{ link::to('offer/'.$channel->link) }}" class="title">{{ $channel->title }}</a>
                <div class="desc">{{ Str::words(strip_tags($channel->desc), 100, ' ...') }}</div>
            </div>
        @endforeach
    @endif
    @if(!is_null($result['products']) && count($result['products']))
        @foreach($result['products'] as $product)
        <li>
            <div class="inf-block">
                <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->seo_url) }}" class="title">{{ $product->title }}</a>
                <div class="desc">{{ Str::words(strip_tags($product->preview), 100, ' ...') }}</div>
            </div>
        @endforeach
    @endif
    @if(!is_null($result['accessories']) && count($result['accessories']))
        @foreach($result['accessories'] as $accessory)
        <li>
            <div class="inf-block">
                <a href="#" class="title"></a>
                <div class="desc"></div>
            </div>
        @endforeach
    @endif
    @if(!is_null($result['news']) && count($result['news']))
        @foreach($result['news'] as $news)
        <li>
            <div class="inf-block">
                <a href="#" class="title"></a>
                <div class="desc"></div>
            </div>
        @endforeach
    @endif
    @if(!is_null($result['pages']) && count($result['pages']))
        @foreach($result['pages'] as $page)
        <li>
            <div class="inf-block">
                <a href="#" class="title"></a>
                <div class="desc"></div>
            </div>
        @endforeach
    @endif
    </ul>
</section>