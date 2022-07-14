<?php

namespace App\Services\Impl;

use App\Http\Repositories\AgencyRepository;
use App\Services\AgencyService;
use App\Services\UserService;

class UserServiceImpl implements UserService
{
    protected $userRepository;

    //TODO: add integration with user repository
//    public function __construct(){
//        $this->userRepository = null;
//    }

    public function getUserDataById(int $id)
    {
        dd("userService");
        return $this->userRepository->findById($id);
    }
}
