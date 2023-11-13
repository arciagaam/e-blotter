<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\BlotterStatus;
use App\Models\Record;
use DateTime;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.user.reports.index", ["blotterStatus" => BlotterStatus::all()]);
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
    public function store(ReportRequest $request)
    {
        $fromDate = new DateTime($request->from);
        $fromDate->setTime(0, 0, 0);

        $toDate = new DateTime($request->to);
        $toDate->setTime(23, 59, 59);

        // $order = $request->order == 'desc' ? 'desc' : 'asc';

        $query = Record::where("barangay_id", auth()->user()->barangays[0]->id)
            ->where("created_at", ">=", $fromDate)
            ->where("created_at", "<=", $toDate)
            ->whereIn("blotter_status_id", $request->blotter_status)
            ->with('blotterStatus', 'victim', 'suspect')
            ->orderBy('barangay_blotter_number', 'desc');

        // if (in_array("complainant", $request->contents)) {
        //     $query = $query->with("victim");
        // }

        // if (in_array("respondent", $request->contents)) {
        //     $query = $query->with("suspect");
        // }

        $results = $query->get();

        $addressee = $request->safe(["addressee_to", "addressee_company", "addressee_address"]);

        return view("pages.user.reports.template", ["results" => $results, "selections" => $request->safe(), "addressee" => $addressee]);
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
    public function update(ReportRequest $request, string $id)
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
