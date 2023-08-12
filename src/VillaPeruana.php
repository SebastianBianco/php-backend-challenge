<?php
namespace App;
require_once __DIR__ . '/ProductFactory.php';

use App\Products\ProductFactory;

class VillaPeruana
{
    private $products = [];

    public function addProduct($name, $quality, $sellIn)
    {
        $product = ProductFactory::create($name, $quality, $sellIn);
        $this->products[] = $product;
    }

    public function update()
    {
        foreach ($this->products as $product) {
            $product->discountSellin();
            $product->update();
        }
    }
}
