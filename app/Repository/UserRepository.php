<?php
    namespace App\Repository;

use App\Models\User;
use App\Repository\Interface\IUserRepository;
    class UserRepository implements IUserRepository
    {
        public function getAll()
        {
            return User::all();
        }
        public function getById($id)
        {
            // TODO: Implement getById() method.
        }
        public function create($request)
        {
            // TODO: Implement create() method.
        }
        public function update( $request,$id)
        {
            // TODO: Implement update() method.
        }
        public function delete($id)
        {
            // TODO: Implement delete() method.
        }
    }