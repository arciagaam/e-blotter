<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = User::nonAdmin();
        return view('pages.admin.accounts.accounts', ['accounts' => $accounts]);
    }

    public function edit(User $user)
    {
        dd($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function verify(Request $request)
    {
        User::find($request->id)->update(['verified_at' => now()]);
    }
    
}
