<?php

namespace GraphicGenie\LaravelOxxa\Models;

/**
 * @property string $sld
 * @property string $tld
 * @property string $producttype // renew, register, transfer, uit quarantaine
 * @property string $identity_admin
 * @property string $identity_tech
 * @property string $identity_billing
 * @property string $identity_registrant
 * @property string $nsgroup
 * @property string $trans_epp
 * @property string $enduserip
 */

class Domain extends Model
{
    protected array $fillable = [
        "sld",
        "tld",
        "producttype",
        "identity-admin",
        "identity-tech",
        "identity-billing",
        "identity-registrant",
        "nsgroup",
        "trans_epp",
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes["enduserip"] = \Request::ip();
    }
}
