<?php
    class Seite 
    {
        protected $model;
        protected $controller;
        
        public function __construct(ShopActions $controller, ShopData $model)
        {
            $this->controller = $controller;
            $this->model = $model;
        }
    
    }
?>