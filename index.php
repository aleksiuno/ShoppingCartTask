<?php

require_once __DIR__ . '/vendor/autoload.php';

use CompanyName\ShoppingCart\Cart as Cart;
use CompanyName\ShoppingCart\Item as Item;

// Entering file by console input
$input = $argv[1];

// Decoding the input and adding items to the cart
$cart = new Cart();
$cart->decodeTextInput($input);

 // $cart->addItem("mbp", "Macbook Pro", 2, 29.99, "EUR");
 // $cart->addItem("zen", "Asus Zenbook", 3, 99.99, "USD");
 // $cart->addItem("mbp", "Macbook Pro", 5, 100.09, "GBP");
 // $cart->addItem("zen", "Asus Zenbook", -1);
 // $cart->addItem("len", "Lenovo P1", 8, 60.33, "USD");
 // $cart->addItem("zen", "Asus Zenbook", 1, 120.99, "EUR");
 //print_r($cart->getItems());

 // Printing out total price
 echo $cart->getTotalPrice("EUR");
