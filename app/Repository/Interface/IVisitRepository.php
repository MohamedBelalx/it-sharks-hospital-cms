<?php
    namespace App\Repository\Interface;

use App\DTO\VisitDTO;

    interface IVisitRepository 
    {
        public function create(VisitDTO $visit);
        public function getAll();
        public function getById(string $id);
        public function update(VisitDTO $visit, string $id);
        public function delete(string $id);
    }