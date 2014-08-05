<?
$instocks = ProductInstock::orderBy('updated_at', 'DESC')
    ->with('image')
    ->with(array('product' => function($query){
            $query->with('meta');
        }))
    ->with('color')
    ->with('action')
    ->get();

#Helper::tad($instocks);

$models = array();

if (count($instocks)) {
    foreach ($instocks as $instock) {
        if (is_object($instock->product))
            $models[$instock->product->id] = $instock->product->meta[0]->title;
    }
}

#Helper::dd($models);

?>
<main>
    <section class="buy-offer used">
        <section class="buy-suboffer">
            <header>
                <h1>
                    Автомобили в наличии
                </h1>
            </header>

            <div class="cars-filter">
                <select class="customSelect selectModel">
                    <option>Все модели</option>
                    @foreach ($models as $m => $model)
                    <option value="{{ $m }}">{{ $model }}</option>
                    @endforeach
                </select>

                <div class="founded">
                    Найдено результатов: <span>{{ count($instocks) }}</span>
                </div>
            </div>


            <table class="exist-table">
                <thead>
                <tr>
                    <th colspan="2">Модель</th>
                    <th>Двигатель / КПП</th>
                    <th>Статус</th>
                    <th>Акции</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody>

                @foreach($instocks as $instock)
<?
$status = false;
if ($instock->status_id) {
    $statuses = Config::get('site.instock_statuses');
    $status = @$statuses[$instock->status_id];
}
?>
                <tr>
                    <td>
                        <div class="car-photo" style="width:300px; height:200px; background-image: url({{ $instock->image->thumb() }})"></div>
                    </td>
                    <td>
                        <a  href="#" class="car-name">Infiniti Q50</a>
                        <div class="car-desc">
                            Цвет: {{ $instock->color->title }}<br>
                            Салон: {{ $instock->interior }}<br>
                            Год: {{ $instock->year }} г.
                        </div>
                    </td>
                    <td>
                        <div class="car-desc">
                            {{ $instock->engine }}<br>
                            {{ $instock->transmission }}
                        </div>
                    </td>
                    <td>
                        <div class="car-desc">
                            {{ $status }}
                        </div>
                    </td>
                    <td>
                        <div class="car-desc">
                            @if (is_object($instock->action))
                            {{ $instock->action->title }}
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="car-price">
                            {{ $instock->price }}
                        </div>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </section>
    </section>
</main>
