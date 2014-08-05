@extends(Helper::layout())

@section('style')
    {{ HTML::style('theme/css/fotorama.css') }}
@stop

@section('content')
@include('production/views/accepts/product-menu')
@if($product->galleries->count())
<div class="gallery">
    @foreach($product->galleries as $slider)
        @if($slider->photos->count())
    <section class="gallery-block gallery-top">
        <a href="#" class="gal-prev"></a>
        <a href="#" class="gal-next"></a>
        <div class="wrapper">
            <div class="gallery-info">
                <div class="title">{{ $product->meta->first()->title }}</div>
                <div class="inf-text">{{ $product->meta->first()->preview }}</div>
            </div>
        </div>
        <div class="gallery-photo">
            @foreach($slider->photos as $photo)
            <img src="{{ asset('uploads/galleries/'.$photo->name) }}" alt="">
            @endforeach
        </div>
    </section>
        @endif
@endforeach
</div>
@endif
@if($product->videos->count())
<section class="gallery-block gallery-top">
    @foreach($product->videos as $video)
    <!--<div class="gal-half" style="background-image: url(/theme/img/gallery/video1.jpg)"><a href="#" class="gal-play"></a></div>-->
    <div class="gal-half">
        {{ $video->content  }}
    </div>
    @endforeach
</section>
@endif
@stop
@section('scripts')
    {{ HTML::script('theme/js/vendor/fotorama.js') }}
@stop
@section('page_script')
    <script>
        $('.gallery').galleryAnim();
        $('.gallery-photo').each(function(){
            var $fotoramaDiv = $(this).fotorama({
                'fit': 'cover',
                'nav': false,
                'width': '100%',
                'height': '100%',
                'loop': true,
                'arrows': false
            });
            var fotorama = $fotoramaDiv.data('fotorama');

            $(this).parent().find('.gal-prev').on('click', function(){
                fotorama.show('<');
            });
            $(this).parent().find('.gal-next').on('click', function(){
                fotorama.show('>');
            });
        });
    </script>
@stop