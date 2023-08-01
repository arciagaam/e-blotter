<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use App\Models\CivilStatus;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.records.blotter-records', ['records' => Record::latest()->withTrashed()->filter(request('search'))->paginate(10), 'barangays' => Barangay::all()]);
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
    public function show(string $record)
    {
        $record = Record::where('id', $record)->withTrashed()->with('victim', 'suspect', 'blotterStatus')->first();
        $civilStatus = new CivilStatus();
        return view('pages.admin.records.show', ['record' => $record, 'civilStatus' => $civilStatus->getAllCivilStatus()]);

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

    /**
     * Print the specified resource
     */
    public function print(string $record)
    {
        return view('pages.admin.records.print', ['record' => Record::where('id', $record)->with('victim', 'suspect')->first()]);
    }
}

// USER:
// 1. sa blotter records po, pachange po nung bgry sa purok. kasi po for specific na brgy na sya, kaya po mas oks kung yung purok nalang

// 2. patanggal po nung divorced, sa civil status

// 3. diba po specific brgy po sila. nag try po ako mag gawa ng new record sa isang brgy. tapos po nag log po ulit ako ng isang brgy, start po yung blotter record sa 1 po ulit dapat. kasi po bukod silang blotter records