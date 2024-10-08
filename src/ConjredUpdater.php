<?php
declare(strict_types=1);

namespace GildedRose;

class ConjredUpdater implements IitemUpdater
{
    public function update(Item $item): void
    {
        
        if ($item->sellIn<0) 
        {
            $item->quality-=4;
        }
        else{
            $item->quality-=2;
        }
        // Ensure quality is never negative
        $item->quality = max(0, $item->quality);
        
    }
}