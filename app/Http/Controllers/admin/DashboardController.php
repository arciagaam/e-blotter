<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use App\Models\User;
use App\Models\Record;
use Illuminate\Http\Request;
use App\Models\BlotterStatus;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::count();
        $blotterStatusCount = [
            'settled' => count(Record::ofTotalStatus(1)),
            'unresolved' => count(Record::ofTotalStatus(2)),
            'kp_cases' => count(Record::ofTotalStatus(3)),
            'endorsed' => count(Record::ofTotalStatus(4)),
            'blotter_cases' => count(Record::ofTotalStatus(5)),
            'dismissed' => count(Record::ofTotalStatus(6)),
        ];

        return view('pages.admin.dashboard.dashboard', ['barangays' => Barangay::withCount('records')->with('users:verified_at')->userNotTrashed()->get(), 'records' => $records, 'blotterStatusCount' => $blotterStatusCount]);
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

    public function getReports()
    {
        $now = time();
        $type = "DAYS";

        $dates = array(
            "dates" => array(),
            "dataset" => array()
        );

        switch ($type) {
            case "DAYS": {
                    $startDate = date('Y-m-d', strtotime('-6 days', $now));
                    $endDate = date('Y-m-d');

                    $reports = Record::whereBetween("created_at", [$startDate, $endDate])->with('blotterStatus', 'barangays')->select('id', 'barangay_id', 'blotter_status_id', 'created_at')->orderBy("created_at", "asc")->get();
                    $blotterStatus = BlotterStatus::all();
                    $barangays = Barangay::whereHas('users', function ($q) {
                        $q->whereNotNull('verified_at');
                    })->get();


                    for ($i = 0; $i < 7; $i++) {
                        array_push($dates["dates"], date("Y-m-d", strtotime("+{$i} days", strtotime($startDate))));
                    }

                    foreach ($blotterStatus as $status) {
                        $dates["dataset"][$status->name] = array();

                        foreach ($barangays as $barangay) {
                            $dates["dataset"][$status->name][$barangay->name] = array_fill(0, count($dates["dates"]), 0);
                        }
                    }

                    foreach ($reports as $report) {
                        $day = date("Y-m-d", strtotime($report->created_at));
                        $statusName = $report->blotterStatus->name;
                        $barangayName = $report->barangays->name;
                        $idx = array_search($day, $dates["dates"]);

                        $dates["dataset"][$statusName][$barangayName][$idx] += 1;
                    }
                }
                break;
            default:
                return;
        }

        return response()->json(["message" => $dates], 200);
    }

    function getCasesPerBarangay()
    {
        return response()->json(["message" => Barangay::withCount('records')->whereHas('users', function ($q) {
            $q->whereNotNull('verified_at');
        })->userNotTrashed()->get()], 200);
    }
}
