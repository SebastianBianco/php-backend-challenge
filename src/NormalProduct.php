<?php

namespace App\Products;
require_once __DIR__ . '/Product.php';

class NormalProduct extends Product
{
    public function __construct($quality, $sellIn, $name)
    {
        parent::__construct($quality, $sellIn, $name);
    }
    
    public function update()
    {
        $this->setQuality(max(0, $this->getQuality() - ($this->sellIn < 0 ? $this->DECREMENT_AFTER_SELLIN_QUALITY : $this->DECREMENT_INCREMENT_NORMAL_PRODUCT_QUALITY)));
    }
}
