<?php
namespace CompanyName\ShoppingCart;

class Item
{
    protected $id;
    protected $name;
    protected $quantity;
    protected $price;
    protected $currency;

    public function __construct($id, $name, $quantity, $price = 0, $currency = null)
    {
        $this->setID($id);
        $this->setName($name);
        $this->setQuantity($quantity);
        $this->setPrice($price);
        $this->setCurrency($currency);
    }

    protected function setID($id){
        $this->id = $id;
    }

    public function getID(){
        return $this->id;
    }

    protected function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
