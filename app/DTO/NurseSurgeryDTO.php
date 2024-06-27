<?php
namespace App\DTO;

use Spatie\LaravelData\Data;

Class NurseSurgeryDTO extends Data
{
    public function __construct(public string $nurse_id)
    {
    }
}
?>