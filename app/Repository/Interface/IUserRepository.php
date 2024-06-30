<?php
    namespace App\Repository\Interface;

use App\DTO\UserDTO;
use App\Enums\Roles;

    interface IUserRepository 
    {
        public function getAll();
        public function getById($id);
        public function create($request);
        public function update(array $request,string $id);
        public function delete(string $id);
        public function getByRole(Roles $role);
        public function getCount(Roles $role);
    }