<?php

namespace GraphicGenie\LaravelOxxa\API;

class Contacts extends Client
{
    public function Check(string $handle)
    {
        return $this->request(
            array_merge(["command" => "identity_get"], ["identity" => $handle])
        );
    }
}
