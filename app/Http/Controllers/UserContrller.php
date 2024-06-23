<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repository\Interface\IUserRepository;
use Illuminate\Http\Request;

class UserContrller extends Controller
{
    protected $user;
    public function __construct(IUserRepository $userRepository)
    {
        $this->user = $userRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user->getAll();
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $userRequest)
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
