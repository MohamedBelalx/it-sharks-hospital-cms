<?php
    namespace App\Repository\Interface;

use App\Enums\Roles;

    interface IUserRepository 
    {
        public function getAll();
        public function getById($id);
        public function create($request);
        public function update($request,$id);
        public function delete($id);
        public function getByRole(Roles $role);
    }