<?php

namespace GraphicGenie\LaravelOxxa\API;

use GraphicGenie\LaravelOxxa\Client;
use GraphicGenie\LaravelOxxa\Models\Domain;

class Domains extends Client
{
    public function check(Domain $domain): array
    {
        $args = ["sld" => $domain->sld, "tld" => $domain->tld];

        return $this->request(
            array_merge(["command" => "domain_check"], $args)
        );
    }

    public function get(Domain $domain): array
    {
        $args = ["sld" => $domain->sld, "tld" => $domain->tld];

        return $this->request(array_merge(["command" => "domain_inf"], $args));
    }

    public function update(Domain $domain): array
    {
        $args = ["sld" => $domain->sld, "tld" => $domain->tld];

        if(isset($domain->identity_registrant))
            $args['identity_registrant'] = $domain->identity_registrant;

        if(isset($domain->trans_epp))
            $args['epp'] = $domain->trans_epp;


        return $this->request(array_merge(["command" => "domain_upd"], $args));
    }

    public function authCode(Domain $domain): array
    {
        $args = ["sld" => $domain->sld, "tld" => $domain->tld];

        return $this->request(array_merge(["command" => "domain_epp"], $args));
    }

    public function transferStatus(Domain $domain): array
    {
        $args = ["sld" => $domain->sld, "tld" => $domain->tld];

        return $this->request(
            array_merge(["command" => "transfer_status"], $args)
        );
    }
}
