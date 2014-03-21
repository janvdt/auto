<?php

class Brand extends BaseModel {

	public function image()
	{
		return $this->belongsTo('Image');
	}

}