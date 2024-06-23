<?php

namespace App\Repository;

use App\Enums\Roles;
use App\Models\User;
use App\Repository\Interface\IUserRepository;
use Illuminate\Support\Facades\DB;
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
        return User::create($request);
    }
    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
    public function getByRole(Roles $role)
    {
        // return match ($role) {
        //     Roles::doctor      =>    User::where('role', Roles::doctor),
        //     Roles::patient    =>    User::where('role', Roles::patient),
        //     Roles::nurse            =>    User::where('role', Roles::nurse)
        // };
        return User::where('role',$role->value)->get();
    }
}
