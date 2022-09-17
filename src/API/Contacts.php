<?php

namespace GraphicGenie\LaravelOxxa\API;

use GraphicGenie\LaravelOxxa\Connection;

class Contacts extends Connection
{
    public function Check(string $handle)
    {
        return $this->request(
            array_merge(["command" => "identity_get"], ["identity" => $handle])
        );
    }
}
