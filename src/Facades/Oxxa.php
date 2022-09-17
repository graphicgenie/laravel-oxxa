<?php

namespace GraphicGenie\LaravelOxxa\Facades;

//use GraphicGenie\LaravelSidn\Models\SidnContact;
//use GraphicGenie\LaravelSidn\Models\SidnDomain;

use Illuminate\Support\Facades\Facade;

/**
// * @method static CheckAvailability(array|string $domains)
// * @method static CreateContact(SidnContact $contact)
// * @method static CreateDomain(SidnDomain $domain)
// * @method static TransferDomain(SidnDomain $domain)
// * @method static GetDomainInfo(string $domain)
// * @method static UpdateNameservers(string $domain, array $nameservers)
// * @method static GetAuthCode(string $domain)
// * @method static CheckContact(string $handle)
// * @method static SetDnsSec(string $domain, array $keys)
// * @method static CancelDomain(string $domain)
// * @method static GetContactData(string $handle)
// * @method static ChangeOwner(string $domain, string $handle)
// * @method static PollMessages(bool $markAsRead = false)
 * @method static Domains()
 * @method static Contacts()
 **/

class Oxxa extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "oxxa";
    }

    public static function __callStatic($class, $args)
    {
        if (class_exists("\\GraphicGenie\\LaravelOxxa\\API\\" . $class)) {
            $class = "\\GraphicGenie\\LaravelOxxa\\API\\" . $class;
        } else {
            throw new \BadMethodCallException($class . " not found");
        }

        return new $class($args);
    }
}
