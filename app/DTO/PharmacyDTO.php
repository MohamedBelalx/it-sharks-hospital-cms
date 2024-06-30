<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class PharmacyDTO extends Data
{
    public function __construct(
        public string $treatment,
        public string $visit_id,
        public string $pharma_id
    ) {
    }
}
