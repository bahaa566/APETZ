<?php

namespace App\Services;

use GuzzleHttp\Client;

class Sms
{
    public static function send(string $phone, string $message = '')
    {
        $url = 'http://www.hisms.ws/api.php';
        $client = new Client();
        $fields = [
            'send_sms' => 'send_sms',
            "username" => "966553172552",
            "password" => "PQ@123456",
            "message" => $message,
            "numbers" => $phone,
            "sender" => 'Panorama',
        ];
        $response = $client->get($url, ['query' => $fields]);

        return $response->getStatusCode();
    }
}
