<?php
namespace CompanyName\ShoppingCart;

// Exchanges money based on currency. Base exchange rate connected to EUR 1:1
class ExchangeCurrency{

    private $exchangeRate = array();
    // Currency exchange rates stored in json file in current directory
    private $exchangeRatePath = __DIR__ . '/currencyExchangeRates.json';

    public function __construct()
    {
        //reads currency rates from json file and stores into an array
        $this->readJsonConversionRates($this->exchangeRatePath);
    }

    // Money conversion formula x = money * requiredMoney / currentMoney
    public function exchangeMoney($money, $currentCurrency, $requiredCurrency)
    {
        return $money * $this->exchangeRate[$requiredCurrency] / $this->exchangeRate[$currentCurrency];
    }

    public function getExchangeRates()
    {
        return $this->exchangeRate;
    }

    // Add rate ir edit existing one
    public function addRate($rateToEuro, $acronym)
    {
        $this->exchangeRate[$acronym] = $rateToEuro;
        $this->saveCurrenciesToFile();
    }

    // Remove rate from currency list
    public function removeRate($acronym){
        unset($this->exchangeRate[$acronym]);
        $this->saveCurrenciesToFile();
    }

    private function saveCurrenciesToFile(){
        $encodedRates = json_encode($this->exchangeRate);
        file_put_contents("$this->exchangeRatePath", $encodedRates);
    }

    private function readJsonConversionRates($exchangeRatePath){
        $file = file_get_contents($exchangeRatePath);
        $this->exchangeRate = json_decode($file, true);
    }

    //Hellper method to push associative array
    function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
    }

}
