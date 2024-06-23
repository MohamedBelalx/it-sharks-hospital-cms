<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class SurgeryDTO extends Data
{
    public function __construct(public string $name, public string $time, public string $doctor_id)
    {
    }
}
