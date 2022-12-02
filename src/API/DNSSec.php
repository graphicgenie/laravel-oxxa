<?php

namespace GraphicGenie\LaravelOxxa\API;

use GraphicGenie\LaravelOxxa\Client;
use GraphicGenie\LaravelOxxa\Models\Domain;

class DNSSec extends Client
{
    public function get(Domain $domain): array
    {
        $args = ["sld" => $domain->sld, "tld" => $domain->tld];

        return $this->request(array_merge(["command" => "dnssec_info"], $args));
    }

    public function add(Domain $domain, array $keys): array
    {
        foreach ($keys as $key) {
            $args = [
                "sld" => $domain->sld,
                "tld" => $domain->tld,
                "flag" => $key['0'],
                "protocol" => $key['1'],
                "alg" => $key['2'],
                "pubkey" => $key['3']
            ];

            $response = $this->request(array_merge(["command" => "dnssec_add"], $args));

            if (str_contains($response['status_code'], 'XMLERR')) {
                return $response;
            }
        }

        return $this->get($domain);
    }

    public function del(Domain $domain, array $keys): array
    {
        foreach ($keys as $key) {
            $args = [
                "sld" => $domain->sld,
                "tld" => $domain->tld,
                "flag" => $key['0'],
                "protocol" => $key['1'],
                "alg" => $key['2'],
                "pubkey" => $key['3']
            ];

            $response = $this->request(array_merge(["command" => "dnssec_del"], $args));

            if (str_contains($response['status_code'], 'XMLERR')) {
                return $response;
            }
        }

        return $this->get($domain);
    }
}