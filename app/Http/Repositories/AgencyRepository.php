<?php

namespace App\Http\Repositories;

interface AgencyRepository
{
    public function findById(int $id);
}
