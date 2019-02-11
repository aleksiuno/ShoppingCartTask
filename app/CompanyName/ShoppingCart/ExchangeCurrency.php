<?php
namespace CompanyName\ShoppingCart;

class ExchangeCurrency{

    private $exchangeRate;

    public function __construct()
    {
        $this->exchangeRate = array("EUR"=> 1,"USD"=> 1.14, "GBP"=>0.88);
    }

    // Money conversion formula x = money * requiredMoney / currentMoney
    public function exchangeMoney($money, $currentCurrency, $requiredCurrency)
    {
        return $money * $this->exchangeRate[$requiredCurrency] / $this->exchangeRate[$currentCurrency];
    }
}
