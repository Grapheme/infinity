<header>
    <div class="search">
        {{ Form::open(array('url'=>link::to('search/request'),'method'=>'post')) }}
            <input type="text" placeholder="Поиск" name="search_request" class="search-input" value="{{ Input::get('query') }}">
            <button type="submit" class="search-icon"></button>
        {{ Form::close() }}
    </div>
    <div class="wrapper">
       @if(!Request::is('/'))
        <a href="{{ link::to() }}" class="logo"></a>
    @else
        <div class="logo"></div>
    @endif
        <div class="nav-container">
            <nav class="nav-main">
                <ul>
                    <li><a {{ (Request::path() == 'about') ? 'class="active"' : '' }} href="{{ link::to('about') }}">О компании</a></li>
                    <li><a {{ (Request::path() == 'catalog') ? 'class="active"' : '' }} href="{{ link::to('catalog') }}">Продукция</a></li>
                    <li><a {{ (Request::path() == 'experience') ? 'class="active"' : '' }} href="{{ link::to('experience') }}">Опыт</a></li>
                    <li><a {{ (Request::path() == 'contacts') ? 'class="active"' : '' }} href="{{ link::to('contacts') }}">Контакты</a></li>
                </ul>
            </nav>
            <div class="nav-line">
                <div class="line"></div>
            </div>
        </div>
    </div>
</header>