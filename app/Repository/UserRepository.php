<?php

namespace App\Repository;

use App\DTO\UserDTO;
use App\Enums\Roles;
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
        return User::findOrFail($id);
    }
    public function create($request)
    {
        // TODO: Implement create() method.
        return User::create($request);
    }
    public function update(array $request,string $id)
    {
        // TODO: Implement update() method.
        return User::findOrFail($id)->where('id',$id)->update($request);
    }
    public function delete(string $id)
    {
        // TODO: Implement delete() method.
        return User::findOrFail($id)->where('id',$id)->delete();
    }
    public function getByRole(Roles $role)
    {
        return User::where('role',$role->value)->get();
    }
}
