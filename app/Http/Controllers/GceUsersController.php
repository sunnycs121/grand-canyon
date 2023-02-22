<?php

namespace App\Http\Controllers;

use App\Models\GceUsers;
use Illuminate\Http\Request;
use App\Rules\EmployeeIdFormat;
use Inertia\Inertia;

class GceUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gceUsers = GceUsers::all();
        return Inertia::render('Dashboard', [
            'gceUsers' => $gceUsers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        dd('in create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:gce_users|max:255',
            'employee_id' => new EmployeeIdFormat,
        ]);

        GceUsers::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
        ]);

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $gceUser = GceUsers::find($id);
        return Inertia::render('EditGceUser', [
            'gceUser' => $gceUser,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GceUsers $gceUsers)
    {
        //
        dd('in edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        //
        $gceUser = GceUsers::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'employee_id' => new EmployeeIdFormat,
        ]);
        $gceUser->update($request->all());
        
        return to_route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $gceUser = GceUsers::find($id);
        $gceUser->delete();
        
        return to_route('dashboard');
    }
}
