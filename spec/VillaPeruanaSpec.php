<?php

require_once __DIR__ . '/../src/Product.php';
require_once __DIR__ . '/../src/VillaPeruana.php';
require_once __DIR__ . '/../src/NormalProduct.php';
require_once __DIR__ . '/../src/PiscoPeruano.php';
require_once __DIR__ . '/../src/Ticket.php';
require_once __DIR__ . '/../src/Cafe.php';
require_once __DIR__ . '/../src/Tumi.php';

use App\Products\NormalProduct;
use App\Products\PiscoPeruano;
use App\Products\Ticket;
use App\Products\Cafe;
use App\Products\Tumi;

describe('Villa Peruana test', function () {

    describe('#update', function () {

        context('Normal Product', function () {
            it('Update normal product before sellIn', function () {
                $product = new NormalProduct(10, 5, 'Helado');

                $product->discountSellin();
                $product->update();

                expect($product->getQuality())->toBe(9);
                expect($product->sellIn)->toBe(4);
            });

        });

        context('Pisco Peruano', function () {
            it('Update Pisco Peruano before sellIn', function () {
                $product = new PiscoPeruano(10, 5, 'Pisco Peruano');

                $product->discountSellin();
                $product->update();

                expect($product->getQuality())->toBe(11);
                expect($product->sellIn)->toBe(4);
            });

        });

        context('Ticket', function () {
            it('Update ticket before sellIn', function () {
                $product = new Ticket(10, 11, 'Ticket VIP al concierto de Pink Floyd');

                $product->discountSellin();
                $product->update();

                expect($product->getQuality())->toBe(12);
                expect($product->sellIn)->toBe(10);
            });

        });

        context('Cafe', function () {
            it('Update Cafe before sellIn', function () {
                $product = new Cafe(10, 15, 'Café');

                $product->discountSellin();
                $product->update();

                expect($product->getQuality())->toBe(8);
                expect($product->sellIn)->toBe(14);
            });

        });

        context('Tumi', function () {
            it('Update Tumi', function () {
                $product = new Tumi('Tumi');

                $initialQuality = $product->getQuality();
                $initialSellIn = $product->sellIn;

                $product->discountSellin();
                $product->update();

                expect($product->getQuality())->toBe($initialQuality);
                expect($product->sellIn)->toBe($initialSellIn);
            });

        });

    });

});
