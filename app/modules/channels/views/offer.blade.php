@extends(Helper::layout())
@section('style')

@stop

@section('content')
<section class="top-bg">
    <header>
        <h2>{{ $element->channel->first()->title }}</h2>
        <div class="desc">
            {{ $element->channel->first()->desc }}
        </div>
    </header>
    @if(File::exists(public_path('uploads/galleries/'.$element->channel->first()->images->name)))
    <img src="{{ asset('uploads/galleries/'.$element->channel->first()->images->name) }}" alt="">
    @endif
</section>

<?php
    $channelCategory = ChannelCategory::where('slug',$element->slug)->first();
    $offers = Channel::where('category_id',@$channelCategory->id)->where('id','!=',$element->channel->first()->id)->orderBy('title')->with('images')->get();
?>
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
            @foreach($offers as $offer)
                <li class="sub-offers-li">
                    @if(File::exists(public_path('uploads/galleries/'.$offer->images->name)))
                   <div class="sub-offers-li-head" style="background: url({{ asset('uploads/galleries/thumbs/'.$offer->images->name) }}) no-repeat 0 0 / cover;">
                       @if(!empty($offer->link))
                       <a href="{{ link::to('offer/'.$offer->link) }}"></a>
                       @endif
                   </div>
                   @endif
                    <div class="sub-offers-li-body">
                        <h3 class="sub-offers-li-header">
                        @if(!empty($offer->link))
                        <a href="{{ link::to('offer/'.$offer->link) }}">{{ $offer->title }}</a>
                        @else
                            {{ $offer->title }}
                        @endif
                        </h3>
                        <div class="sub-offers-li-desc">
                            {{ $offer->short }}
                        </div>
                    </div>
            @endforeach
        </ul>
    </section>
</section>
@stop
@section('scripts')

@stop