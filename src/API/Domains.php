<?php

namespace GraphicGenie\LaravelOxxa\API;

use GraphicGenie\LaravelOxxa\Connection;

class Domains extends Connection
{
    public function Check(string $domain)
    {
        $_domain = explode(".", $domain);
        $args = ["sld" => $_domain[0], "tld" => $_domain[1]];

        return $this->request(
            array_merge(["command" => "domain_check"], $args)
        );
    }
}