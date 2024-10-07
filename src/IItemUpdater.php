<?php

declare(strict_types=1);

namespace GildedRose;

interface IItemUpdater
{
    public function update(Item $item): void;
    // Decrease sellIn for all items except Sulfuras
    //public function DecreasesellIn():void;
}