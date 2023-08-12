<?php

namespace App\Products;
require_once __DIR__ . '/Product.php';

class Cafe extends Product
{
    protected $CAFE_DECREMENT_QUALITY = 2;    
    
    public function __construct($quality, $sellIn, $name)
    {
        parent::__construct($quality, $sellIn, $name);
    }
    

    public function update()
    {
        $degradationFactor = ($this->sellIn < 0) ? ($this->DECREMENT_AFTER_SELLIN_QUALITY * $this->CAFE_DECREMENT_QUALITY) : $this->CAFE_DECREMENT_QUALITY;
        $this->setQuality(max(0, $this->getQuality() - $degradationFactor));
    }
}
