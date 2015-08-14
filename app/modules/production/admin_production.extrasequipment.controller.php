<?php

class AdminProductionExtrasequipmentController extends BaseController {

    public static $name = 'product_extras_equipment';
    public static $group = 'production';

    /****************************************************************************/

    ## Routing rules of module
    public static function returnRoutes($prefix = null) {

        $class = __CLASS__;
        Route::group(array('before' => 'auth', 'prefix' => $prefix), function() use ($class) {
            Route::get("production/product/edit/{product_id}/extras-equipment",array('as'=> 'product_extras_equipment_index','uses' => $class.'@index'));
            Route::get("production/product/edit/{product_id}/extras-equipment/create",array('as'=> 'product_extras_equipment_create','uses' => $class.'@create'));
            Route::post("production/product/edit/{product_id}/extras-equipment/store",array('as'=> 'product_extras_equipment_store','uses' => $class.'@store'));
            Route::get("production/product/edit/{product_id}/extras-equipment/{equipment_id}/edit",array('as'=> 'product_extras_equipment_edit','uses' => $class.'@edit'));
            Route::post("production/product/edit/{product_id}/extras-equipment/{equipment_id}/update",array('as'=> 'product_extras_equipment_update','uses' => $class.'@update'));
            Route::delete("production/product/edit/{product_id}/extras-equipment/{equipment_id}/delete",array('as'=> 'product_extras_equipment_delete','uses' => $class.'@destroy'));
        });
    }

    public static function returnExtFormElements() {}

    public static function returnActions() {}

    public static function returnInfo() {}
    /****************************************************************************/

    protected $product;
    protected $accessory;

    public function __construct(Product $product, ProductExtrasEquipment $equipment){

        $this->product = $product->findOrFail(Request::segment(5));
        $this->equipment = $equipment;
        $this->module = array(
            'name' => self::$name,
            'group' => self::$group,
            'rest' => NULL,
            'tpl'  => static::returnTpl('admin.' . self::$name),
            'gtpl' => static::returnTpl(),
        );
        View::share('module', $this->module);
    }

	public function index(){

        Allow::permission($this->module['group'], 'product_view');
        $product = $this->product;
        $equipments = $this->product->extras_equipment()->with('category', 'accessibility')->with('images')->get();
        return View::make($this->module['tpl'].'index', compact('product','equipments'));
	}

    /****************************************************************************/

    public function create(){

        Allow::permission($this->module['group'], 'product_create');
        $product = $this->product;
        return View::make($this->module['tpl'].'create', compact('product'));
    }

    public function store(){

        if(!Request::ajax()) return App::abort(404);
        Allow::permission($this->module['group'], 'product_create');
        $json_request = array('status'=>FALSE, 'responseText'=>'', 'responseErrorText'=>'', 'redirect'=>FALSE, 'gallery'=>0);
        $validation = Validator::make(Input::all(), ProductExtrasEquipment::$rules);
        if($validation->passes()) {
            self::saveProductExtrasEquipmentModel();
            $json_request['responseText'] = "Дополнительное оборудование добавлено";
            $json_request['redirect'] = URL::route('product_extras_equipment_index',array('product_id'=>$this->product->id));
            $json_request['status'] = TRUE;
        } else {
            $json_request['responseText'] = 'Неверно заполнены поля';
            $json_request['responseErrorText'] = implode($validation->messages()->all(),'<br />');
        }
        return Response::json($json_request, 200);
    }

    /****************************************************************************/

    public function edit($product_id, $equipment_id){

        Allow::permission($this->module['group'], 'product_edit');
        $equipment = $this->equipment->where('id', $equipment_id)->with('images')->first();
        $product = $this->product;
        return View::make($this->module['tpl'].'edit', compact('product', 'equipment'));
    }

    public function update($product_id, $equipment_id){

        if(!Request::ajax()) return App::abort(404);
        Allow::permission($this->module['group'], 'product_edit');
        $json_request = array('status'=>FALSE, 'responseText'=>'', 'responseErrorText'=>'', 'redirect'=>FALSE, 'gallery'=>0);
        $validation = Validator::make(Input::all(), ProductExtrasEquipment::$rules);
        if($validation->passes()):
            $equipment = $this->equipment->find($equipment_id);
            self::saveProductExtrasEquipmentModel($equipment);
            $json_request['responseText'] = 'Дополнительное оборудование обновлен';
            $json_request['status'] = TRUE;
        else:
            $json_request['responseText'] = 'Неверно заполнены поля';
            $json_request['responseErrorText'] = implode($validation->messages()->all(), '<br />');
        endif;

        return Response::json($json_request, 200);
    }

    /****************************************************************************/

    public function destroy($product_id, $equipment_id){

        if(!Request::ajax()) return App::abort(404);
        Allow::permission($this->module['group'], 'product_delete');
        $json_request = array('status'=>FALSE, 'responseText'=>'');
        if(Request::ajax()):
            $equipment = $this->equipment->find($equipment_id);
            if($image = $equipment->images()->first()):
                if (!empty($image->name) && File::exists(public_path('uploads/galleries/thumbs/'.$image->name))):
                    File::delete(public_path('uploads/galleries/thumbs/'.$image->name));
                    File::delete(public_path('uploads/galleries/'.$image->name));
                    Photo::find($image->id)->delete();
                endif;
            endif;
            $equipment->delete();
            $json_request['responseText'] = 'Дополнительное оборудование удалено';
            $json_request['status'] = TRUE;
        else:
            return App::abort(404);
        endif;
        return Response::json($json_request,200);
    }

    private function saveProductExtrasEquipmentModel($equipment = NULL){

        if(is_null($equipment)):
            $equipment = $this->equipment;
        endif;

        $equipment->product_id = $this->product->id;
        $equipment->title = Input::get('title');
        $equipment->price = Input::get('price');
        $equipment->description = Input::get('description');
        $equipment->category_id = Input::get('category_id');
        $equipment->accessibility_id = Input::get('accessibility_id');
        $equipment->image_id =  Input::get('image');

        ## Сохраняем в БД
        $equipment->save();
        $equipment->touch();

        return $equipment;
    }

}