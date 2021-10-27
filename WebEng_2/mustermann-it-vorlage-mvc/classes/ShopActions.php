<?php
class ShopActions
{
    private $model;
 
    public function __construct(ShopData $model) {
        $this->model = $model;
    }
	
	public function calcSpecialOfferPrice($euro, $conversion_factor)
    {
    	return $euro * 0.8 * $conversion_factor;
    }

    public function setCurrencyToUsd()
    {
        $this -> model -> currencySymbol = "USD";
        $this -> model -> currencyRate = 1.16;
    }

    public function __call($name,$values)
    {

    }

}


