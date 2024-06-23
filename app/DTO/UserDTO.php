<?php
namespace App\DTO;

use App\Http\Requests\UserRequest;
use Spatie\LaravelData\Data;

Class UserDTO extends Data
{
    public function __construct(public string $name,public string $email,public string $password,public string $role,
                                public string $gender,public string $image,public string $department_id)
    {
        $this->password = bcrypt($password);
    }

    public function handleInputs(UserRequest $userRequest):array
    {   
        if($userRequest->image){
            $image = $userRequest->image;
            $newImageName = time() . $image->getClientOriginalName();
            $image->move('assets/images/userImages/', $newImageName);
            return [
                'name' => $userRequest->name,
                'email' => $userRequest->email,
                'password' => $userRequest->password,
                'department_id' => $userRequest->department_id,
                'role' => $userRequest->role,
                'gender' => $userRequest->gender,
                'image' => '/assets/images/userImages/' . $newImageName,
            ];
        }else{
            return [
                'name' => $userRequest->name,
                'email' => $userRequest->email,
                'password' => $userRequest->password,
                'department_id' => $userRequest->department_id,
                'role' => $userRequest->role,
                'gender' => $userRequest->gender
            ];
        }
    }
}