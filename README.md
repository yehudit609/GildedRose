# GildedRose Kata - PHP Version

This is the PHP version of the GildedRose exercise.
Gilded Rose is a small inn with a prime location in a prominent city ran by a friendly innkeeper named Allison. They buy and sell only the finest goods. Their goods are constantly degrading in Quality as they approach their sell by date.

They have a system in place that updates inventory. The following is a brief description of the system:

- All items have a SellIn value which denotes the number of days to sell the items

- All items have a Quality value which denotes how valuable the item is

- At the end of each day the system lowers both values for every item

- Once the sell by date has passed, Quality degrades twice as fast

- The Quality of an item is never negative

The following are special cases:

- "Aged Brie" actually increases in Quality the older it gets

- The Quality of an item is never more than 50

- "Sulfuras", being a legendary item, never has to be sold or decreases in Quality

- "Backstage passes", like aged brie, increases in Quality as its SellIn value approaches;

- Quality increases by 2 when there are 10 days or less and by 3 when there are 5 days or less but

- Quality drops to 0 after the concert

The following new item required an update to the system:

- "Conjured" items degrade in Quality twice as fast as normal items

## Upgrade Changes

The following is a short description of the software updates:
1) Creating and running tests before and after code changes to ensure code reliability
2) Refactoring code to improve efficiency and readability by consolidating duplicate code and reorganizing the code into smaller functions. Refactoring code changes have been committed in small increments 
3) Adding the new 'Conjured' item feature.

## Installation

The kata uses:

- [8.0+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Recommended:

- [Git](https://git-scm.com/downloads)

See [GitHub cloning a repository](https://help.github.com/en/articles/cloning-a-repository) for details on how to
create a local copy of this project on your computer.

```sh
git clone git@github.com:yehudit609/GildedRose.git
```

or

```shell script
git clone https://github.com/yehudit609/GildedRose.git
```

Install all the dependencies using composer

```shell script
cd ./GildedRose
composer install
```

## Dependencies

The project uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [ApprovalTests.PHP](https://github.com/approvals/ApprovalTests.php)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard)

## Folders

- `src` - contains the two classes:
    - `Item.php` 
    - `GildedRose.php` - this class is refactored, and includes the new feature
- `tests` - contains the tests
    - `GildedRoseTest.php` - includes all the tests
     
- `Fixture`
    - `texttest_fixture.php` this could be used by an ApprovalTests, or run from the command line

## Fixture

To run the fixture from the php directory:

```shell
php .\fixtures\texttest_fixture.php 10
```

Change **10** to the required days.

## Testing

PHPUnit is configured for testing, a composer script has been provided. To run the unit tests, from the root of the PHP
project run:

```shell script
composer tests
```

A Windows a batch file has been created, like an alias on Linux/Mac (e.g. `alias pu="composer tests"`), the same
PHPUnit `composer tests` can be run:

```shell script
pu.bat
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening /builds/**index.html** in your
browser.

The [XDEbug](https://xdebug.org/download) extension is required for generating the coverage report.

## Code Standard

Easy Coding Standard (ECS) is configured for style and code standards, **PSR-12** is used. The current code is not upto
standard!

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

On Windows a batch file has been created, like an alias on Linux/Mac (e.g. `alias cc="composer check-cs"`), the same
PHPUnit `composer check-cs` can be run:

```shell script
cc.bat
```

### Fix Code

ECS provides may code fixes, automatically, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

On Windows a batch file has been created, like an alias on Linux/Mac (e.g. `alias fc="composer fix-cs"`), the same
PHPUnit `composer fix-cs` can be run:

```shell script
fc.bat
```

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan
```

On Windows a batch file has been created, like an alias on Linux/Mac (e.g. `alias ps="composer phpstan"`), the same
PHPUnit `composer phpstan` can be run:

```shell script
ps.bat
