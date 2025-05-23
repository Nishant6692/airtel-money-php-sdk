<?php

namespace AirtelMoney;

use Illuminate\Support\Facades\Http;

class Auth
{
    public static function getToken()
    {
        $baseUrl = config('airtel.base_url');
        $clientId = config('airtel.client_id');
        $clientSecret = config('airtel.client_secret');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("{$baseUrl}/auth/oauth2/token", [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'client_credentials',
        ]);

        if ($response->failed()) {
            throw new \Exception('Failed to get access token: ' . $response->body());
        }

        return $response->json('access_token');
    }
}

