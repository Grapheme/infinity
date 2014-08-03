@extends(Helper::layout())

@section('style')
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
            <div class="gallery-img" style="background-image: url({{ asset('uploads/galleries/'.$photo->name) }})"></div>
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
@section('page_script')
    <script>
        $('.gallery').galleryAnim();
    </script>
@stop