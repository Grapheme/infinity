@extends(Helper::acclayout())
@section('style')
{{ HTML::style('css/redactor.css') }}
@stop
@section('content')
    <h1>Продукция: Новое оборудование ({{ $product->meta->first()->title }})</h1>
{{ Form::open(array('url'=>URL::route('product_extras_equipment_store',array('product_id'=>$product->id)), 'role'=>'form', 'class'=>'smart-form', 'id'=>'product-equipment-form', 'method'=>'post')) }}
    {{ Form::hidden('accessibility_id', 1) }}
    <div class="row margin-top-10">
        <section class="col col-6">
            <div class="well">
                <header>Для добавления оборудования заполните форму:</header>
                <fieldset>
                    <section>
                        <label class="label">Название</label>
                        <label class="input"> <i class="icon-append fa fa-list-alt"></i>
                            {{ Form::text('title','') }}
                        </label>
                    </section>
                    <section>
                        <label class="label">Цена</label>
                        <label class="input"> <i class="icon-append fa fa-list-alt"></i>
                            {{ Form::text('price','') }}
                        </label>
                    </section>
                    <section>
                        <label class="label">Категория</label>
                        <label class="select">
                            {{ Form::select('category_id', ProductAccessoryCategories::lists('title','id') ) }}
                        </label>
                    </section>
                    @if (Allow::module('galleries'))
                    <section>
                        <label class="label">Изображение</label>
                        <label class="input">
                            {{ ExtForm::image('image', '') }}
                        </label>
                    </section>
                    @endif
                    <section>
                        <label class="label">Описание</label>
                        <label class="textarea">
                            {{ Form::textarea('description','',array('class'=>'redactor redactor_150')) }}
                        </label>
                    </section>
                    <section>
                        <label class="label">Порядковый номер</label>
                        <label class="input"> <i class="icon-append fa fa-list-alt"></i>
                            {{ Form::text('order', (int) ProductExtrasEquipment::orderBy('order','DESC')->pluck('order') + 1) }}
                        </label>
                    </section>
                </fieldset>
            </div>
        </section>
    </div>
    <div style="float:none; clear:both;"></div>
    @if(Allow::enabled_module('galleries') && 0)
    <section class="col-12">
        @include('modules.galleries.abstract')
        @include('modules.galleries.uploaded', array('gallery' => $gall))
    </section>
    @endif
    <section class="col-6">
        <footer>
            <a class="btn btn-default no-margin regular-10 uppercase pull-left btn-spinner" href="{{URL::previous()}}">
                <i class="fa fa-arrow-left hidden"></i> <span class="btn-response-text">Назад</span>
            </a>
            <button type="submit" autocomplete="off" class="btn btn-success no-margin regular-10 uppercase btn-form-submit">
                <i class="fa fa-spinner fa-spin hidden"></i> <span class="btn-response-text">Создать</span>
            </button>
        </footer>
    </section>
{{ Form::close() }}
@stop


@section('scripts')
    <script>
    var essence = 'product-equipment';
    var essence_name = 'Доп. оборудование продукта';
	var validation_rules = {
		title: { required: true },
	};
	var validation_messages = {
		title: { required: 'Укажите название' },
	};
    </script>

    {{ HTML::script('js/modules/standard.js') }}

	<script type="text/javascript">
		if(typeof pageSetUp === 'function'){pageSetUp();}
		if(typeof runFormValidation === 'function'){
			loadScript("{{ asset('js/vendor/jquery-form.min.js') }}", runFormValidation);
		}else{
			loadScript("{{ asset('js/vendor/jquery-form.min.js') }}");
		}
	</script>

   {{ HTML::script('js/modules/gallery.js') }}
   {{ HTML::script('js/vendor/redactor.min.js') }}
   {{ HTML::script('js/system/redactor-config.js') }}
@stop