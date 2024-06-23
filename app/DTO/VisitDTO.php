<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class VisitDTO extends Data
{
    public function __construct(public string $time, public string $doctor_id, public string $nurse_id, public string $patient_id)
    {
    }
}
