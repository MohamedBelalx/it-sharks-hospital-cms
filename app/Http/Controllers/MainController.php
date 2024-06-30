<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use Illuminate\Http\Request;
use App\Repository\Interface\IUserRepository;

class MainController extends Controller
{
    public $userRepository;
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $users = $this->userRepository->getwithLimitAndRole(Roles::DOCTOR, 3);

        return view('main.index',[
            'users' => $users
        ]);
    }
}
