<?php

namespace App\Http\Controllers;

use App\Services\AgencyService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(AgencyService $userService){
        $this->userService = $userService;
    }

    public function getUserById(Request $request){
        dd($this->userService->getAgencyDataById($request->id));
    }
}
