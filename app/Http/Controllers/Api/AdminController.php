<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Admin::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $validated =  $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $admins = Admin::create($validated);

        return $admins;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); // Revokes all tokens for the authenticated user
        return response()->json(['message' => 'Admin logged out successfully']);
    }
}
