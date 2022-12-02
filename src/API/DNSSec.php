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
                "flag" => $key['flags'],
                "protocol" => $key['protocol'],
                "alg" => $key['alg'],
                "pubKey" => $key['pubKey']
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
                "flag" => $key['flags'],
                "protocol" => $key['protocol'],
                "alg" => $key['alg'],
                "pubKey" => $key['pubKey']
            ];

            $response = $this->request(array_merge(["command" => "dnssec_del"], $args));

            if (str_contains($response['status_code'], 'XMLERR')) {
                return $response;
            }
        }

        return $this->get($domain);
    }
}