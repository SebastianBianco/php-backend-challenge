<?php

namespace App\Products;

require_once __DIR__ . '/Tumi.php';
require_once __DIR__ . '/PiscoPeruano.php';
require_once __DIR__ . '/Ticket.php';
require_once __DIR__ . '/Cafe.php';
require_once __DIR__ . '/NormalProduct.php';
class ProductFactory
{
    public static function create($name, $quality, $sellIn)
    {
        switch ($name) {
            case 'Tumi':
                return new Tumi($sellIn, $name);
            case 'Pisco Peruano':
                return new PiscoPeruano($quality, $sellIn, $name);
            case 'Ticket VIP al concierto de Pink Floyd':
                return new Ticket($quality, $sellIn, $name);
            case 'Café':
                return new Cafe($quality, $sellIn, $name);
            default:
                return new NormalProduct($quality, $sellIn, $name);
        }
    }
}
