<?php

namespace App\Services;

use Illuminate\Support\Arr;

class GettingPhoneStatusesService implements ServiceInterface
{
    const VALID = 1 ;
    const NON_VALID = 0;

    const VALID_TEXT = 'OK' ;
    const NON_VALID_TEXT = 'NOK' ;

    const STATUSES = [
        self::VALID     => self::VALID_TEXT,
        self::NON_VALID => self::NON_VALID_TEXT
    ];

    public function execute($data = [])
    {
        return collect(self::STATUSES)->map(function ($status,$key){
            return [
                'name' => $status,
                'value' => $key,
            ];
        });
    }

    public function getStatusString($status = self::VALID):?string
    {
        return Arr::get(self::STATUSES,$status);
    }
}
