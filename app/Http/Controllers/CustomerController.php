<?php

namespace App\Http\Controllers;

use App\Services\GettingCountriesService;
use App\Services\GettingCustomersService;
use App\Services\GettingPhoneStatusesService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, GettingCustomersService $gettingCustomersService, GettingCountriesService $gettingCountriesService,GettingPhoneStatusesService $gettingPhoneStatusesService)
    {
        $customers = $gettingCustomersService->execute($request->only('country_code','status'));
        $countries = $gettingCountriesService->execute();
        $statuses = $gettingPhoneStatusesService->execute();
        return view('customers.index',compact('customers','countries','statuses'));
    }
}
