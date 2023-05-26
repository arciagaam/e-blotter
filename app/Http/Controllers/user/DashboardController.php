<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\BlotterStatus;
use App\Models\Record;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::where('barangay_id', auth()->user()->barangays[0]->id)->get();
        $blotterStatusCount = [
            'settled' => count(BlotterStatus::find(1)->records),
            'unresolved' => count(BlotterStatus::find(2)->records),
            'dismissed' => count(BlotterStatus::find(3)->records),
            'inProsecution' => count(BlotterStatus::find(4)->records),
        ];

        return view('pages.user.dashboard.dashboard', ['records' => count($records), 'blotterStatusCount' => $blotterStatusCount]);
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
