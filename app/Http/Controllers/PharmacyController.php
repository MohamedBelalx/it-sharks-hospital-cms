<?php

namespace App\Http\Controllers;

use App\DTO\PharmacyDTO;
use App\Enums\Roles;
use App\Http\Requests\PharmacyRequest;
use Illuminate\Http\Request;
use App\Repository\Interface\IPharmacyRepository;
use App\Repository\Interface\IUserRepository;
use App\Repository\Interface\IVisitRepository;

class PharmacyController extends Controller
{
    private $pharmacyRepository;
    private $userRepository;
    private $visitRepository;
    public function __construct(IPharmacyRepository $pharmacyRepository, IUserRepository $userRepository, IVisitRepository $visitRepository)
    {
        $this->pharmacyRepository = $pharmacyRepository;
        $this->userRepository = $userRepository;
        $this->visitRepository = $visitRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pharmacies = $this->pharmacyRepository->getAll();
        return view('dashboard.pharmacy.index', ['pharmacies' => $pharmacies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pharma = $this->userRepository->getByRole(Roles::PHARMACY);
        $visits = $this->visitRepository->getAll();
        return view('dashboard.pharmacy.create', ['pharma' => $pharma, 'visits' => $visits]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PharmacyRequest $request)
    {
        $this->pharmacyRepository->create(PharmacyDTO::from($request));
        return redirect()->route('pharmacy.index');
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
