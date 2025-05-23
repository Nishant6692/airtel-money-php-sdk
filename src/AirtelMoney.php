<?php
namespace AirtelMoney;

class AirtelMoney
{
    public static function collect(string $reference, string $msisdn, float $amount): array
    {
        return Collection::initiate($reference, $msisdn, $amount);
    }
}
