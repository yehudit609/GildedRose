<?php

declare(strict_types=1);

namespace GildedRose;


final class GildedRose
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }
    
    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $item->sellIn--;

            switch ($item->name) {
                case 'Aged Brie':
                     $itemUpdater = new AgedBrieItemUpdater();   
                     break;               
                case 'Backstage passes to a TAFKAL80ETC concert':
                   $itemUpdater=new BackstagePassesItemUpdater();
                      break;
                case 'Conjred Mana Cake':
                    $itemUpdater=new ConjredUpdater();
                    break;      
                case 'Sulfuras, Hand of Ragnaros':
                     $itemUpdater = new SulfurasItemUpdater();
                     break;
                default:
                    $itemUpdater = new ItemUpdater();
                    break;
            }
            $itemUpdater->update($item);           

        }
    }

    }
    
   
    
