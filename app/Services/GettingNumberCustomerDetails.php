<?php

namespace App\Services;

use App\Countries\Country;
use App\Countries\CountryInterface;
use Illuminate\Support\Str;

class GettingNumberCustomerDetails
{
    protected CountryInterface $country;
    protected string $code = '';
    protected string $number = '';
    protected bool $isValid;

    public function execute(string $number)
    {
        $this->setNumber($number);
        $this->setCode();
        $this->setCountry();

        return [
            'code'    => $this->getFormatedCode(),
            'country' => $this->getCountry(),
            'status'  => $this->getStatusText(),
            'phone'   => $this->getSplittedPhone(),
        ];
    }

    protected function getFormatedCode()
    {
        return '+' . $this->code;
    }

    protected function getCountry()
    {
        return $this->country->getName();
    }

    protected function getIsValid()
    {
        return preg_match('/' . $this->country->getRegex() . '/', $this->number);
    }

    protected function setCountry()
    {
        collect(Country::CODES)->each(function ($country) {
            $country = new $country();
            if ($country->getCode() == $this->code) {
                $this->country = $country;
                return FALSE;
            }
        });
    }

    protected function setCode()
    {
        $this->code = Str::between($this->number, '(', ')');
    }

    protected function setNumber(string $number)
    {
        $this->number = $number;
    }

    protected function getStatusText()
    {
        return (new GettingPhoneStatusesService())->getStatusString($this->getIsValid());
    }

    protected function getSplittedPhone()
    {
        return Str::afterLast($this->number,')');
    }
}
