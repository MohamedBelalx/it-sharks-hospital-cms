<?php

namespace App\Repository;

use App\DTO\SurgeryDTO;
use App\Models\Surgery;
use App\Repository\Interface\ISurgeryRepository;

class SurgeryRepository implements ISurgeryRepository
{
    public function create(SurgeryDTO $surgery)
    {
        return Surgery::create($surgery->toArray());
    }
}
