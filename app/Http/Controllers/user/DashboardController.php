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
        $records = Record::where('barangay_id', auth()->user()->barangays[0]->id)->count();
        $blotterStatusCount = [
            'settled' => count(Record::ofStatus(1)),
            'unresolved' => count(Record::ofStatus(2)),
            'dismissed' => count(Record::ofStatus(3)),
            'inProsecution' => count(Record::ofStatus(4)),
        ];

        setAlertMessage('Title', 'Lorem ipsum, dolor sit amet.', 'warning');
        // session()->flash('alert', ['title' => 'Test Title', 'description' => 'Lorem ipsum dolor sit amet.', 'type' => 'information']);
        return view('pages.user.dashboard.dashboard', ['records' => $records, 'blotterStatusCount' => $blotterStatusCount]);
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
