<?php
namespace AirtelMoney;

use Illuminate\Support\Facades\Http;

class HttpClient
{
    public static function post(string $endpoint, array $data = [], ?string $token = null): array
    {
        $url = rtrim(config('airtel.base_url'), '/') . $endpoint;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => $token ? "Bearer $token" : null,
        ])->post($url, $data);

        return $response->json();
    }
}
