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
        $record = Record::orderBy('id', 'desc')->withTrashed()->getSearchQuery()->paginate(10)->withQueryString();

        return view('pages.admin.records.blotter-records', ['records' => $record, 'barangays' => Barangay::whereHas('users', function ($q) {
            $q->whereNotNull('verified_at');
        })->get()]);
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
        return view('pages.admin.records.print', ['record' => Record::where('id', $record)->withTrashed()->with('victim', 'suspect')->first()]);
    }
}
