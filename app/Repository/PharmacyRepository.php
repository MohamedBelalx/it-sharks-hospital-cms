<?php

namespace App\Repository;

use App\DTO\PharmacyDTO;
use App\Repository\Interface\IPharmacyRepository;
use App\Models\Pharmacy;

class PharmacyRepository implements IPharmacyRepository
{
    public function getAll()
    {
        return Pharmacy::select('*')->join('users', 'users.id', '=', 'pharmacy.pharma_id')->get();
    }

    public function create(PharmacyDTO $pharmacyDTO)
    {
        return Pharmacy::create($pharmacyDTO->toArray());
    }
}
