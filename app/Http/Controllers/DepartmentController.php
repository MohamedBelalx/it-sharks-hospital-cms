<?php

namespace App\Http\Controllers;

use App\DTO\DepartmentDTO;
use App\Http\Requests\DepartmentRequest;
use App\Repository\Interface\IDepartmentRepository;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $department;
    public function __construct(IDepartmentRepository $DepartmentRepository)
    {
        $this->department = $DepartmentRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = $this->department->getAll();
        return view('dashboard.department.index',['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $departmentRequest)
    {
        $departmentDTO = DepartmentDTO::from($departmentRequest->all());
        $this->department->store($departmentDTO);
        return redirect()->route("department.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $selectedDepartment = $this->department->getById($id);
        return view('dashboard.department.edit',['department'=>$selectedDepartment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $departmentRequest, string $id)
    {
        $departmentDTO = DepartmentDTO::from($departmentRequest->all());
        $this->department->update($departmentDTO,$id);
        return redirect()->route("department.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->department->delete($id);
        return redirect()->back();
    }
}
