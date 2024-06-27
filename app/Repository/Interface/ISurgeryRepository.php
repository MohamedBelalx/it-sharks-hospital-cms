<?php

namespace App\Repository\Interface;

use App\DTO\NurseSurgeryDTO;
use App\DTO\SurgeryDTO;

interface ISurgeryRepository
{
    public function create(SurgeryDTO $surgery,NurseSurgeryDTO $nurseSurgeryDTO);
    public function getAll();
    public function getById(string $id);
    public function getNurseBySurgery(string $id);
    public function update(SurgeryDTO $surgery, NurseSurgeryDTO $nurseSurgeryDTO, string $id);
    public function delete(string $id);
    // public function getByPatientId($id);
}
