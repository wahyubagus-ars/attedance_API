<?php

namespace App\Services\Impl;

use App\Http\Repositories\AgencyRepository;
use App\Services\AgencyService;

class AgencyServiceImpl implements AgencyService
{
    protected $agencyRepository;

    public function __construct(AgencyRepository $agencyRepository){
        $this->agencyRepository = $agencyRepository;
    }

    public function getAgencyDataById(int $id)
    {
        return $this->agencyRepository->findById($id);
    }
}
