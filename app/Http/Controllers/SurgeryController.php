<?php

namespace App\Http\Controllers;

use App\DTO\NurseSurgeryDTO;
use App\DTO\SurgeryDTO;
use App\Enums\Roles;
use App\Models\Surgery;
use App\Http\Requests\StoreSurgeryRequest;
use App\Http\Requests\UpdateSurgeryRequest;
use App\Repository\Interface\IUserRepository;
use App\Repository\Interface\ISurgeryRepository;

class SurgeryController extends Controller
{
    protected $userRepository;
    protected $surgeryRepository;
    public function __construct(IUserRepository $userRepository, ISurgeryRepository $surgeryRepository)
    {
        $this->userRepository = $userRepository;
        $this->surgeryRepository = $surgeryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surgeries = $this->surgeryRepository->getAll();
        return view('dashboard.surgery.index', ['surgeries'=> $surgeries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = $this->userRepository->getByRole(Roles::DOCTOR);
        $nurse = $this->userRepository->getByRole(Roles::NURSE);
        return view('dashboard.surgery.create', [
            'doctors' => $doctors,
            'nurse' => $nurse
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurgeryRequest $request)
    {
        // dd($request->nurse_id);
        $this->surgeryRepository->create(SurgeryDTO::from($request->all()),NurseSurgeryDTO::from($request->all()));
        return redirect()->route('surgery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surgery $surgery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surgery $surgery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSurgeryRequest $request, Surgery $surgery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surgery $surgery)
    {
        //
    }
}
