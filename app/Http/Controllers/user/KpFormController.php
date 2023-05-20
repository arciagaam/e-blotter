<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KpForm;
use Illuminate\Http\Request;

class KpFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.user.kp_form.kp-form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.kp_form.create');
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
    public function show(KpForm $kpForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KpForm $kpForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KpForm $kpForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KpForm $kpForm)
    {
        //
    }
}
