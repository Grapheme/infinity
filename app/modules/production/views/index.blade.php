<?php
if($products = Product::orderBy('title')->with('images')->get()):
    $products = $products->toArray();
endif;
?>

<div class="wrapper">
    <div class="us-block">
        <ul class="products">
            @foreach($products as $product)
            <li>
                <div class="product-photo" style="background-image: url(uploads/galleries/{{ $product['images']['name'] }});"></div>
                <div class="product-info">
                    <div class="block-title">{{ $product['title'] }}</div>
                    <div class="us-text">
                        {{ $product['short'] }}
                    </div>
                    {{ $product['desc'] }}
                </div>
            @endforeach
        </ul>
    </div>
</div>