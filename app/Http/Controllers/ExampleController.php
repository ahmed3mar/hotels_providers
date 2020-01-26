<?php

namespace App\Http\Controllers;

use App\Contracts\Configs\SearchConfig;
use App\Services\OurHotelsService;
use Carbon\Carbon;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(OurHotelsService $hotelsService) {

        $config = new SearchConfig();
        $config
            ->setFromDate(Carbon::today())
            ->setToDate(Carbon::tomorrow())
            ->setCity('Cairo')
            ->setAdults(3)
        ;

        return $hotelsService->search($config);

    }

    //
}
