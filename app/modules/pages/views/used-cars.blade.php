@extends(Helper::layout())
@section('style')
{{ HTML::style('theme/css/sumoselect.css') }}
@stop

@section('content')
 <section class="buy-offer used">
    <section class="buy-suboffer">
        <header>
            <h1>Автомобили с пробегом</h1>
            <div class="desc">
                {{ $content }}
            </div>
        </header>
        <?php
            $products = $accessories = array();
            if($all_products = Product::with('meta')->get()):
                foreach($all_products as $product):
                    $products[$product->id] = $product->meta->first()->title;
                endforeach;
            endif;
            $channelCategory = ChannelCategory::where('slug','car-for-sale')->first();
            $cars = Channel::where('category_id',@$channelCategory->id)->orderBy('title')->with('images')->get();
        ?>
    @if(count($products))
        <div class="cars-filter">
            <select name="model" class="customSelect selectModel">
                <option value="0">Все модели</option>
            @foreach($products as $product_id => $product_title)
                <option value="{{ $product_id }}">{{ $product_title }}</option>
            @endforeach
            </select>
            <select name="year" class="customSelect selectYear">
            @for($i = (int)date("Y"); $i >= 1960; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
            </select>
            <div class="founded">
                Найдено результатов: <span id="count-results">{{ $cars->count() }}</span>
            </div>
        </div>
    @endif
        @include('channels/views/used-cars',compact('channelCategory','cars'))
    </section>
</section>
@stop
@section('scripts')
{{ HTML::script("theme/js/vendor/jquery.sumoselect.min.js") }}
<script>
    $('.customSelect.selectModel').SumoSelect({placeholder: 'Модель'});
    $('.customSelect.selectYear').SumoSelect({placeholder: 'Год'});
</script>
@stop