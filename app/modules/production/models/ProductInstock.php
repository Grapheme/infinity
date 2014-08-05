<?php

class ProductInstock extends BaseModel {

    protected $guarded = array();
    protected $table = 'products_instock';

    public static $rules = array(
        'title' => 'required',
        'price' => 'required',
    );

    public  function images(){
        return $this->belongsTo('Photo','image_id');
    }
}