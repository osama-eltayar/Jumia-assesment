<?php

namespace App\Services;

use App\Models\Customer;

class GettingCustomersService implements ServiceInterface
{
    protected $perPage = 5 ;

    public function execute($data = [])
    {
        return $this->getCustomers($data);
    }

    public function setPaginate(int $perPage)
    {
        $this->perPage = $perPage ;
        return $this;
    }

    protected function getCustomers(array $data)
    {
        $customerDetailsService = new GettingNumberCustomerDetails();
        return Customer::query()
                ->filter($data)
                ->simplePaginate($this->perPage)
                ->through(function ($customer) use ($customerDetailsService){
                return $customerDetailsService->execute($customer->phone) ;
            })->appends($data);
    }
}
