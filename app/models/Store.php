<?php

class Store extends BaseModel {

	public function image()
	{
		return $this->belongsTo('Image');
	}

}