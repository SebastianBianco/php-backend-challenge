<?php

namespace App\Products;

abstract class Product
{
    public $name;
    public $quality;
    public $sellIn;
    
    public $DECREMENT_INCREMENT_NORMAL_PRODUCT_QUALITY = 1;
    public $DECREMENT_AFTER_SELLIN_QUALITY = 2;    
    public $MAX_PRODUCT_QUALITY = 50;

    public function __construct($quality, $sellIn, $name)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
        $this->name = $name;
    }

    abstract public function update();

    public function discountSellin(){
        $this->sellIn = max(0,$this->sellIn - 1);
    }

    public function setQuality($num){
        $this->quality = $num;
    }
    
    public function getQuality(){
        return $this->quality;
    }
}
