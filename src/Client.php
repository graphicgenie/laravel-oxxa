<?php

namespace GraphicGenie\LaravelOxxa;

use Illuminate\Support\Facades\Http;

class Client
{
    public function request(array $args): array
    {
        $response = Http::get(
            config("laravel-oxxa.endpoint"),
            array_merge(
                [
                    "apiuser" => config("laravel-oxxa.username"),
                    "apipassword" =>
                        "MD5" . md5(config("laravel-oxxa.password")),
                    "test" => config("laravel-oxxa.test") ? "Y" : "N",
                ],
                $args
            )
        );

        return json_decode(
            json_encode(
                simplexml_load_string(
                    $response->getBody(),
                    "SimpleXMLElement",
                    LIBXML_NOCDATA
                )->order
            ),
            true
        );
    }
}
