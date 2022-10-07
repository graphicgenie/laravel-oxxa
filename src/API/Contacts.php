<?php

namespace GraphicGenie\LaravelOxxa\API;

use GraphicGenie\LaravelOxxa\Client;
use GraphicGenie\LaravelOxxa\Models\Contact;

class Contacts extends Client
{
    public function check(string $handle): array
    {
        return $this->request([
            "command" => "identity_get",
            "identity" => $handle,
        ]);
    }

    public function add(Contact $contact): array
    {
        return $this->request(
            array_merge(["command" => "identity_add"], $contact->all())
        );
    }

    public function get(string $handle): array
    {
        return $this->request([
            "command" => "identity_get",
            "identity" => $handle,
        ]);
    }

    public function list(array $args = []): array
    {
        return $this->request(
            array_merge(["command" => "identity_list"], $args)
        );
    }

    public function update(string $handle, Contact $contact): array
    {
        return $this->request(
            array_merge(
                ["command" => "identity_list"],
                ["identity" => $handle],
                $contact->all()
            )
        );
    }

    public function delete(string $handle): array
    {
        return $this->request([
            "command" => "identity_del",
            "identity" => $handle,
        ]);
    }
}
