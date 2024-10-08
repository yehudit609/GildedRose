<?php
declare(strict_types=1);

namespace GildedRose;

class ItemUpdater implements IitemUpdater
{
    //The function is based on the requirement:
    //Once the sell by date has passed, Quality degrades twice as fast

    public function update(Item $item): void
    {
        if ($item->sellIn<0) 
        {
            $item->quality-=2;
        }
        else{
            $item->quality--;
        }
        // Ensure quality is never negative
        $item->quality = max(0, $item->quality);
    }
    
}
