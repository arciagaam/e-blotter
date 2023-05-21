<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = User::all();
        return view('pages.admin.accounts.accounts', ['accounts' => $accounts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function verify(Request $request)
    {
        User::find($request->id)->update(['verified_at' => now()]);
    }
    
}
