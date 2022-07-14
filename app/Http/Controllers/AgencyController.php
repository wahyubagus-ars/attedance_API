<?php

namespace App\Http\Controllers;

use App\Services\AgencyService;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    protected $agencyService;

    public function __construct(AgencyService  $agencyService){
        $this->agencyService = $agencyService;
    }

    public function getAgencyById(Request $request){
        return $this->agencyService->getAgencyDataById($request->id);
    }
}
