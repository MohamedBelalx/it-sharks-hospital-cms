<?php

namespace App\Repository\Interface;

use App\DTO\SurgeryDTO;

interface ISurgeryRepository
{
    public function create(SurgeryDTO $surgery);
}
