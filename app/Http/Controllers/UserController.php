<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\UserRequest;
use App\Repository\Interface\IUserRepository;
use Illuminate\Http\Request;
use App\Repository\Interface\IDepartmentRepository;
use App\Enums\Roles;
use Illuminate\Support\Facades\Auth;

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

    public function main()
    {
        $doctor = $this->userRepository->getCount(Roles::DOCTOR);
        $nurse = $this->userRepository->getCount(Roles::NURSE);
        $patient = $this->userRepository->getCount(Roles::PATIENT);
        $pharmacy = $this->userRepository->getCount(Roles::PHARMACY);
        $authUser = $this->userRepository->getById(Auth::id());
        return view('dashboard.index', [
            'doctor' => $doctor,
            'nurse' => $nurse,
            'patient' => $patient,
            'pharmacy' => $pharmacy,
            'user' => $authUser
        ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userRepository->getById($id);
        $departments = $this->departmentRepository->getAll();
        return view('dashboard.user.edit', ['user' => $user, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = UserDTO::handleInputs($request);
        $this->userRepository->update($user, $id);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userRepository->delete($id);
        return redirect()->back();
    }
}
