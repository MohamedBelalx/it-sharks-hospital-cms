<?php

namespace App\Repository;

use App\DTO\VisitDTO;
use App\Repository\Interface\IVisitRepository;
use App\Models\Visit;
class VisitRepository implements IVisitRepository
{
    public function create(VisitDTO $visit)
    {
        return Visit::create($visit->toArray());
    }
}
