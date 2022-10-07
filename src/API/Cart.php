<?php

namespace GraphicGenie\LaravelOxxa\API;

use GraphicGenie\LaravelOxxa\Client;
use GraphicGenie\LaravelOxxa\Models\Model;

class Cart extends Client
{
    public function get(string $cart_id): array
    {
        return $this->request(["command" => "cart_get", "cart_id" => $cart_id]);
    }

    public function add(Model $model): array
    {
        return $this->request(
            array_merge(["command" => "cart_add"], $model->all())
        );
    }

    public function delete(string $item_id, bool $empty = false): array
    {
        $args = [
            "enduserip" => \Request::ip(),
            "itemid" => $item_id,
            "emptycart" => $empty ? "N" : "Y",
        ];
        return $this->request(array_merge(["command" => "cart_del"], $args));
    }

    public function list(): array
    {
        return $this->request(["command" => "cart_list"]);
    }

    public function purchase(string $cart_id = "ALL"): array
    {
        return $this->request([
            "command" => "cart_purchase",
            "cart_id" => $cart_id,
        ]);
    }
}
