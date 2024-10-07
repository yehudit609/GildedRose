<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testUpdateQualityForNormalItem(): void
    {
        $items = [new Item('Normal Item', 10, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Normal Item', $items[0]->name);
        $this->assertSame(9, $items[0]->sellIn);
        $this->assertSame(19, $items[0]->quality);
    }
    public function testElixirOfTheMongooseBeforeSellInDate(): void
    {
        $items = [new Item('Elixir of the Mongoose', 10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 9);
        $this->assertEquals($items[0]->quality, 9);
    }
    public function testAgedBrieAtTheBeginning(): void
    {
        $items = [new Item('Aged Brie', 2, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 1);
        $this->assertEquals($items[0]->quality, 1);
    }
    public function testAgedBrieWhenSellInZero(): void
    {
        $items = [new Item('Aged Brie', 0, 2)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, -1);
        $this->assertEquals($items[0]->quality, 4);
    }
    public function testAgedBrieDontIncreaseMaximum(): void
    {
        $items = [new Item('Aged Brie', 0, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, -1);
        $this->assertEquals($items[0]->quality, 50);
    }

    public function testAgedBrieAfterSellInPassed(): void
    {
        $items = [new Item('Aged Brie', -6, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, -7);
        $this->assertEquals($items[0]->quality, 12);
    }

    public function testAgedBrieNearMaximumQuality(): void
    {
        $items = [new Item('Aged Brie', 0, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, -1);
        $this->assertEquals($items[0]->quality, 50);
    }

    public function testBackstagePassesBeforeSellInPassed(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 9);
        $this->assertEquals($items[0]->quality, 12);
    }
    public function testBackstagePassesMoreThan10DaysBeforeSellInPassed(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 13, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 12);
        $this->assertEquals($items[0]->quality, 11);
    }

    public function testBackstagePassesfiveDaysBeforeSellInPassed(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5,8)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 4);
        $this->assertEquals($items[0]->quality, 11);
    }

     public function testBackstagePassesSellInDate(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, -1);
        $this->assertEquals($items[0]->quality, 0);
    }

    public function testBackstagePassesCloseToSellInPassedWithMaxQuality(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 9);
        $this->assertEquals($items[0]->quality, 50);
    }

    public function testBackstagePassesVeryCloseToSellInPassedWithMaxQuality(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 4);
        $this->assertEquals($items[0]->quality, 50);
    }

    public function testSulfurasBeforeSellInPassed(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 10, 100)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 10);
        $this->assertEquals($items[0]->quality, 100);
    }

    public function testSulfurasSellInPassed(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 30)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 0);
        $this->assertEquals($items[0]->quality, 30);
    }

    public function testSulfurasAfterSellInPassed(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', -1, 30)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, -1);
        $this->assertEquals($items[0]->quality, 30);
    }
    public function testConjuredBeforeSellInPassed(): void
    {
        $items = [new Item('Conjred Mana Cake', 10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, 9);
        $this->assertEquals($items[0]->quality, 8);
    }
    public function testConjuredSellInPassed(): void
    {
        $items = [new Item('Conjred Mana Cake', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sellIn, -1);
        $this->assertEquals($items[0]->quality, 6);
    }
}

