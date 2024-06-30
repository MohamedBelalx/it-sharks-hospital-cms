<?php

namespace App\Repository\Interface;

use App\DTO\PharmacyDTO;

interface IPharmacyRepository
{
    public function getAll();
    public function create(PharmacyDTO $pharmacy);
}
