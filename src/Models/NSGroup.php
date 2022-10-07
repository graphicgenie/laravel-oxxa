<?php

namespace GraphicGenie\LaravelOxxa\Models;
/**
 * @property string $alias
 * @property string $ns1_fqdn
 * @property string $ns2_fqdn
 * @property string $ns3_fqdn
 * @property string $ns4_fqdn
 * @property string $ns5_fqdn
 * @property string $ns6_fqdn
 */

class NSGroup extends Model
{
    protected array $fillable = [
        "alias",
        "ns1_fqdn",
        "ns2_fqdn",
        "ns3_fqdn",
        "ns4_fqdn",
        "ns5_fqdn",
        "ns6_fqdn",
    ];
}
