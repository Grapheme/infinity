<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductionExtrasEquipment extends Migration {

	public function up(){
		Schema::create('production_extras_equipment', function(Blueprint $table){
			$table->increments('id');
			$table->string('title',128)->nullable();
			$table->string('price',100)->nullable();
			$table->text('description')->nullable();
			$table->integer('category_id')->default(0)->unsigned()->nullable();
			$table->integer('accessibility_id')->default(0)->unsigned()->nullable();
			$table->integer('image_id')->default(0)->unsigned()->nullable();
			$table->integer('product_id')->default(0)->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down(){
		Schema::drop('production_extras_equipment');
	}

}
