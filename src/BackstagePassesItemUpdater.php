<?php
declare(strict_types=1);

namespace GildedRose;

class BackstagePassesItemUpdater implements IItemUpdater
{
    public function update(Item $item): void
    {
        if ($item->sellIn < 1) {
            $item->quality = 0;
        } elseif ($item->sellIn < 6) {
            $item->quality += 3;
        } elseif ($item->sellIn < 11) {
            $item->quality += 2;
        } else {
            $item->quality++;
        }    

        if($item->quality > 50) {
            $item->quality = 50;
        }
}
    
}