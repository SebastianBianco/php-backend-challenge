<?php

namespace App\Products;
require_once __DIR__ . '/Product.php';

class Ticket extends Product
{
    protected $TICKET_QUALITY_INCREMENT_1 = 2;
    protected $TICKET_QUALITY_INCREMENT_2 = 3;
    protected $TICKET_QUALITY_INCREMENT_DAY_2 = 5;
    protected $TICKET_QUALITY_INCREMENT_DAY_1 = 10;

    public function __construct($quality, $sellIn, $name)
    {
        parent::__construct($quality, $sellIn, $name);
    }
    

    public function update()
    {
        switch (true)  {
            case ($this->sellIn <= 0):
                $this->quality = 0;
                break;
    
            case ($this->sellIn <= $this->TICKET_QUALITY_INCREMENT_DAY_2):
                $this->increaseTicketQuality($this->TICKET_QUALITY_INCREMENT_2);
                break;
    
            case ($this->sellIn <= $this->TICKET_QUALITY_INCREMENT_DAY_1):
                $this->increaseTicketQuality($this->TICKET_QUALITY_INCREMENT_1);
                break;
    
            default:
                $this->increaseTicketQuality($this->DECREMENT_INCREMENT_NORMAL_PRODUCT_QUALITY);
                break;
        }
    }

    private function increaseTicketQuality($amount) {
        $this->setQuality(min($this->MAX_PRODUCT_QUALITY, $this->getQuality() + $amount));
    }


}
