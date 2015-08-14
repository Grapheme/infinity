<?php

class ProductExtrasEquipment extends BaseModel {

    protected $guarded = array();
    protected $table = 'production_extras_equipment';

    public static $rules = array(
        'title' => 'required',
        'category_id' => 'required',
        'accessibility_id' => 'required',
    );

    public function images(){
        return $this->belongsTo('Photo','image_id');
    }

    public function category(){

        return $this->hasOne('ProductAccessoryCategories','id','category_id');
    }

    public function accessibility(){

        return $this->hasOne('ProductAccessoryAccessibility','id','accessibility_id');
    }

    public function product(){

        return $this->belongsTo('Product');
    }
}