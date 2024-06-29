<?php

namespace App\DTO;

use App\Http\Requests\UserRequest;
use Spatie\LaravelData\Data;

class UserDTO extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role,
        public string $gender,
        public string $image,
        public string $department_id
    ) {
        $this->password = bcrypt($password);
    }

    public static function handleInputs(UserRequest $userRequest)
    {
        $data =  [
            'name' => $userRequest->name,
            'email' => $userRequest->email,
            'department_id' => $userRequest->department_id,
            'role' => $userRequest->role,
            'gender' => $userRequest->gender,
        ];
        if ($userRequest->image) {
            $image = $userRequest->image;
            $newImageName = time() . $image->getClientOriginalName();
            $image->move('img/userImages/', $newImageName);
            $data['image'] = 'img/userImages/' . $newImageName;
        }
        if($userRequest->password){
            $data['password'] = $userRequest->password;
        }
        return $data;
    }
}
