<?php
    namespace App\Repository;

use App\DTO\DepartmentDTO;
use App\Models\Department;
use App\Repository\Interface\IDepartmentRepository;
    class DepartmentRepository implements IDepartmentRepository
    {
        public function getAll()
        {
            return Department::all();
        }
        public function getById($id):object
        {
        return Department::findOrFail($id);
        }
        public function store(DepartmentDTO $departmentDTO):bool
        {
            return (Department::create($departmentDTO->toArray())) ? true : false;
        }
        public function update(DepartmentDTO $departmentDTO,$id):bool
        {
            return (Department::where('id',$id)->update($departmentDTO->toArray())) ? true : false;
        }
        public function delete($id):bool
        {
            return (Department::where('id',$id)->delete()) ? true : false;
        }
}