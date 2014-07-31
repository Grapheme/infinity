<div class="model-menu">
   <div class="model-options">
       <span class="model-name">QX70</span>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url) }}" class="model-option">Обзор</a>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url.'/specifications') }}" class="model-option">Характеристики</a>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url.'/galleries') }}" class="model-option">Галерея</a>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url.'/complections') }}" class="model-option">Комплектации и цены</a>
       <a href="{{ link::to(ProductionController::$prefix_url.'/'.$product->meta->first()->seo_url.'/accessories') }}" class="model-option">Аксессуары</a>
   </div><!--
--><span class="model-exist">Х {{ $product->meta->first()->title }} в наличии</span><!--
-->@if(!empty($product->brochure) && File::exists(public_path($product->brochure)))<a href="{{ asset($product->brochure) }}" target="_blank" class="broshure-link"><span>Брошюра</span></a>@endif
</div>