<?php
namespace App;
require_once __DIR__ . '/ProductFactory.php';

use App\Products\ProductFactory;

class VillaPeruana
{
    private $products = [];

    /**
     * Add a new Product to de Store
     *
     * @param string $name Product name.
     * @param int $quality Product Quality.
     * @param int $sellIn Number of days left to sell the product.
     * @return void 
     */
    public function addProduct($name, $quality, $sellIn)
    {
        $product = ProductFactory::create($name, $quality, $sellIn);
        $this->products[] = $product;
    }

    /**
     * Updates all the store products reducing the quantity and SellIn properties
     *
     * @return void 
     */
    public function update()
    {
        foreach ($this->products as $product) {
            $product->discountSellin();
            $product->update();
        }
    }
}
