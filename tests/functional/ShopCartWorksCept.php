<?php

use Tests\FunctionalTester;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure a product can be purchased online.');
$I->amOnPage('/index.php');

// No items in cart
$I->see('Cart (0 items)');

// Simulate session
$I->amOnPage('/index.php?items=%5B%7B%22price%22%3A123%2C%22expires%22%3A%22never%22%7D%2C+%7B%22price%22%3A200%2C%22expires%22%3A%2260min%22%7D%5D');
$I->see('Cart (2 items)');
$I->see('item 1: 200 (expires ' . date('Y-m-d'));
$I->see('item 0: 123 (no time limit');