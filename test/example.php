<?php

use AirtelMoney\AirtelMoney;

// Simple collection request
try {
    $response = AirtelMoney::collect(
        'txn-'.time(),           // Unique reference ID
        '256784123456',          // Customer phone number (MSISDN)
        10000                    // Amount in minor units (e.g. cents)
    );

    echo "Collection initiated successfully:\n";
    print_r($response);

} catch (\Exception $e) {
    echo "Error initiating collection: " . $e->getMessage();
}

