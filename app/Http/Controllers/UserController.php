<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\UserRequest;
use App\Repository\Interface\IUserRepository;
use Illuminate\Http\Request;
use App\Repository\Interface\IDepartmentRepository;

class UserController extends Controller
{
    protected $userRepository;
    protected $departmentRepository;
    public function __construct(IUserRepository $userRepository, IDepartmentRepository $departmentRepository)
    {
        $this->userRepository = $userRepository;
        $this->departmentRepository = $departmentRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = $this->departmentRepository->getAll();
        return view('dashboard.user.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $userRequest)
    {
        $user = UserDTO::handleInputs($userRequest);
        $this->userRepository->create($user);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
