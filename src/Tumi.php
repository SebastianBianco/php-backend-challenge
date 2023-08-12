<?php

namespace App\Products;
require_once __DIR__ . '/Product.php';

class Tumi extends Product
{
    protected $TUMI_QUALITY = 80;
    protected $TUMI_SELLIN = 80;
    
    public function __construct($name)
    {
        parent::__construct($this->TUMI_QUALITY, $this->TUMI_SELLIN, $name);
    }
    
    public function update(){}
    public function discountSellin(){}
}
