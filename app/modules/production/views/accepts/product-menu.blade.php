<div class="model-menu">
   <div class="model-options">
       <span class="model-name">{{ $product->meta->first()->short_title }}</span>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url) }}" class="model-option">Обзор</a>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url.'/specifications') }}" class="model-option">Характеристики</a>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url.'/galleries') }}" class="model-option">Галерея</a>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url.'/complections') }}" class="model-option">Комплектации и цены</a>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url.'/accessories') }}" class="model-option">Аксессуары</a>
   </div><!--
-->@if($instocks_count = $product->instocks->count())<span class="model-exist"><a href="{{ link::to('cars-in-stock?model=' . $product->id) }}" class="model-option">{{ $instocks_count }} {{ $product->meta->first()->title }} в наличии</a></span>@endif<!--
-->@if(!empty($product->brochure) && File::exists(public_path($product->brochure)))<a href="{{ asset($product->brochure) }}" target="_blank" class="broshure-link"><span>Брошюра</span></a>@endif
</div>