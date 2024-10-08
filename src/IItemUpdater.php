<?php

declare(strict_types=1);

namespace GildedRose;

interface IitemUpdater
{
    public function update(Item $item): void;
    
}
