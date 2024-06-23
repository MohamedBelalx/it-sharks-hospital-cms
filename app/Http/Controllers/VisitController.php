<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interface\IUserRepository;
use App\Enums\Roles;

class VisitController extends Controller
{
    protected $userRepository;
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = $this->userRepository->getByRole(Roles::DOCTOR);
        $patient = $this->userRepository->getByRole(Roles::PATIENT);
        $nurse = $this->userRepository->getByRole(Roles::NURSE);

        return view('dashboard.visit.create', [
            'doctors' => $doctors,
            'patient' => $patient,
            'nurse' => $nurse
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
