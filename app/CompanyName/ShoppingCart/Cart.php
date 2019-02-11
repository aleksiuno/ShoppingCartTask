<?php
namespace CompanyName\ShoppingCart;

use CompanyName\ShoppingCart\Item as Item;
use CompanyName\ShoppingCart\ExchangeCurrency as ExchangeCurrency;

class Cart
{
    protected $items = array();

    public function addItem($id, $name, $quantity, $price = 0, $currency = null)
    {
        // If quantity -1, and cart not empty remove item from list
        if($quantity <= -1 && sizeof($this->items) != 0){
            $this->removeEntry($id);
        }else {
            $this->addEntry($id, $name, $quantity, $price, $currency);
        }
    }

    public function decodeTextInput($textInput)
    {
        // Read each line
        if ($fh = fopen($textInput, 'r')) {
            while (!feof($fh)) {
                $line = fgets($fh);
                // Split string by semicolons
                $inputs = explode(";", $line);
                // If input is empty, set it to null
                if(!isset($inputs[0])) $inputs[0] = null;
                if(!isset($inputs[1])) $inputs[1] = null;
                if(!isset($inputs[2])) $inputs[2] = null;
                if(!isset($inputs[3])) $inputs[3] = null;
                if(!isset($inputs[4])) $inputs[4] = null;
                // Add item to the cart TRIM whitespaces on currency string
                $this->addItem($inputs[0], $inputs[1], $inputs[2], $inputs[3], trim($inputs[4]));
            }
            fclose($fh);
        }
    }

    private function removeEntry($id)
    {
        // Search $items array for $item with $id
        foreach ($this->items as $item) {
            // If $item with $id found
            if($item->getID() == $id){
                // Get $item index in $items array
                $arrayIndex = array_search($item, $this->items);
                // Remove item from $items array
                unset($this->items[$arrayIndex]);
            }
        }
    }

    private function addEntry($id, $name, $quantity, $price, $currency)
    {
        $item = new Item($id, $name, $quantity, $price, $currency);
        array_push($this->items, $item);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotalPrice($currency){
        $exchange = new ExchangeCurrency();
        $totalPrice = 0;
        // Iterate over all products
        foreach ($this->items as $item) {
            // If currency is different than required then convert to required and add to total price
            if($item->getCurrency() != $currency){
                $totalPrice += $exchange->exchangeMoney($item->getPrice(), $item->getCurrency(), $currency) * $item->getQuantity();
            }else{
                $totalPrice += $item->getPrice() * $item->getQuantity();
            }
        }
        return $totalPrice;
    }
}
