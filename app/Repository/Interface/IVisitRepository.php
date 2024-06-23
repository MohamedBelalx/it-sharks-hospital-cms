<?php
    namespace App\Repository\Interface;

use App\DTO\VisitDTO;

    interface IVisitRepository 
    {
        public function create(VisitDTO $visit);
        public function getAll();
    }
?>