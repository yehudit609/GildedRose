<?php
declare(strict_types=1);

namespace GildedRose;

class SulfurasItemUpdater implements IItemUpdater
{
    //The function is based on the requirement:
    //"Sulfuras", being a legendary item, never has to be sold or decreases in Quality

    public function update(Item $item): void
    {
        $item->sellIn++;        
    }
}