<?php
declare(strict_types=1);

namespace GildedRose;

class AgedBrieItemUpdater implements IItemUpdater
{
    public function update(Item $item): void
    {
        $this->increaseQuality($item);
        if ($item->sellIn < 0) {
            $this->increaseQuality($item);
        }
    }

    private function increaseQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
        
    }
}