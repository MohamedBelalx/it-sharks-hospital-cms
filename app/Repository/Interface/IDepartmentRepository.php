<?php
    namespace App\Repository\Interface;

use App\DTO\DepartmentDTO;

    interface IDepartmentRepository 
    {
        public function getAll();
        public function getById($id):object;
        public function store(DepartmentDTO $departmentDTO):bool;
    public function update(DepartmentDTO $departmentDTO, $id): bool;
        public function delete($id):bool;
    }
