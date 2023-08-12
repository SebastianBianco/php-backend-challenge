<?php

namespace App\Products;
require_once __DIR__ . '/Product.php';

class PiscoPeruano extends Product
{
    public function __construct($quality, $sellIn, $name)
    {
        parent::__construct($quality, $sellIn, $name);
    }
    
    public function update()
    {
        $this->setQuality (min($this->MAX_PRODUCT_QUALITY, $this->getQuality() + $this->DECREMENT_INCREMENT_NORMAL_PRODUCT_QUALITY));
    }
}
