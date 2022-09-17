<?php

namespace GraphicGenie\LaravelOxxa\API;

use Illuminate\Support\Facades\Http;

class Client
{
    protected string $endpoint = "https://api.oxxa.com/command.php";

    public function request($args): array
    {
        $response = Http::get(
            $this->endpoint,
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
