<?php

namespace AirtelMoney;

use Illuminate\Support\Facades\Http;

class Collection
{
    public static function collect($reference, $msisdn, $amount)
    {
        $token = Auth::getToken();
        $baseUrl = config('airtel.base_url');

        $payload = [
            "reference" => $reference,
            "subscriber" => [
                "country" => config('airtel.country'),
                "currency" => config('airtel.currency'),
                "msisdn"   => $msisdn
            ],
            "transaction" => [
                "amount" => $amount,
                "country" => config('airtel.country'),
                "currency" => config('airtel.currency'),
            ]
        ];

        $response = Http::withToken($token)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post("{$baseUrl}/merchant/v1/payments/", $payload);

        if ($response->failed()) {
            throw new \Exception('Collection failed: ' . $response->body());
        }

        return $response->json();
    }
}

