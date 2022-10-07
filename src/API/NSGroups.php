<?php

namespace GraphicGenie\LaravelOxxa\API;

use GraphicGenie\LaravelOxxa\Client;
use GraphicGenie\LaravelOxxa\Models\NSGroup;

class NSGroups extends Client
{
    public function add(NSGroup $nsgroup): array
    {
        return $this->request(
            array_merge(["command" => "nsgroup_add"], $nsgroup->all())
        );
    }

    public function delete(string $nsgroup_id): array
    {
        return $this->request([
            "command" => "nsgroup_del",
            "nsgroup" => $nsgroup_id,
        ]);
    }
}
