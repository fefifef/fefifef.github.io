<?php
class ShopActions
{
    private $model;
 
    public function __construct(ShopData $model) {
        $this->model = $model;
    }
	
	public function calcSpecialOfferPrice($euro)
    {
    	return $euro*0.8;
    }
   
}


