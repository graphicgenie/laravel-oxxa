<?php

namespace GraphicGenie\LaravelOxxa\Models;

/**
 * @property string $alias
 * @property string $company // "Y" or "N"
 * @property string $company_name
 * @property string $jobtitle // required if company
 * @property string $firstname
 * @property string $lastname
 * @property string $street
 * @property string $number
 * @property string $suffix
 * @property string $postalcode
 * @property string $city
 * @property string $state
 * @property string $tel
 * @property string $email
 * @property string $country
 */

class Contact extends Model
{
    protected array $fillable = [
        "alias",
        "company",
        "company_name",
        "jobtitle",
        "firstname",
        "lastname",
        "street",
        "number",
        "suffix",
        "postalcode",
        "city",
        "state",
        "tel",
        "email",
        "country",
    ];
}
