<?php

namespace App\Http\Repositories\Impl;

use App\Agency;
use App\Http\Repositories\AgencyRepository;

class AgencyRepositoryImpl implements AgencyRepository
{
    public function findById(int $id)
    {
        return Agency::find($id);
    }
}
