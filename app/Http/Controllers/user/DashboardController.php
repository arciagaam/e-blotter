<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashboardRequest;
use App\Models\BlotterStatus;
use App\Models\IssuedKpFormField;
use App\Models\Record;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
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

        // setAlertMessage('Title', 'Lorem ipsum, dolor sit amet.', 'warning');
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

    /**
     * Sends a response containing all the hearing dates within specific range
     */
    public function getHearingDates(DashboardRequest $request)
    {
        $hearingDates = Record::where('records.barangay_id', auth()->user()->barangays[0]->id)
            ->join('issued_kp_forms', 'records.id', '=', 'issued_kp_forms.record_id')
            ->join('issued_kp_form_fields', function (JoinClause $join) use ($request) {
                $join->on('issued_kp_forms.id', '=', 'issued_kp_form_fields.issued_kp_form_id')
                    ->where('issued_kp_form_fields.tag_id', 'hearing')
                    ->whereBetween('issued_kp_form_fields.value', [$request->validated('start'), $request->validated('end')]);
            })
            ->select('records.id', 'records.barangay_blotter_number', 'issued_kp_form_fields.value', 'issued_kp_forms.kp_form_id')
            ->get();

        $hearingDatesFormatted = array();

        foreach ($hearingDates as $key => $value) {
            array_push($hearingDatesFormatted, [
                'id' => $key,
                'title' => "Blotter No. $value->barangay_blotter_number | KP No. $value->kp_form_id",
                'description' => "KP Form No. $value->kp_form_id",
                'start' => date('Y-m-d', strtotime($value->value))
            ]);
        }

        return response()->json(['message' => $hearingDatesFormatted], 200);
    }

    public function getReports()
    {

        $now = time();
        $type = "DAYS";

        // key = Date
        // value = Count of records

        // Dataset structure
        // {
        //     label: "Settled",
        //     data: [14, 23, 40, 4, 12, 23, 22],
        //     fill: false,
        //     borderColor: "rgb(5, 150, 105)",
        //     tension: 0.1
        // },

        // JSON structure
        $dates = array(
            "dates" => array(),
            "dataset" => array()
        );

        switch ($type) {
            case "DAYS": {
                    $startDate = date('Y-m-d', strtotime('-6 days', $now));
                    $endDate = date('Y-m-d');

                    $reports = Record::whereBetween("created_at", [$startDate, $endDate])->where('barangay_id', auth()->user()->barangays[0]->id)->with('blotterStatus')->select('id', 'blotter_status_id', 'created_at')->orderBy("created_at", "asc")->get();
                    $blotterStatus = BlotterStatus::all();

                    for ($i = 0; $i < 7; $i++) {
                        array_push($dates["dates"], date("Y-m-d", strtotime("+{$i} days", strtotime($startDate))));
                    }

                    foreach ($blotterStatus as $status) {
                        $dates["dataset"][$status->name] = array_fill(0, count($dates["dates"]), 0);
                    }


                    foreach ($reports as $report) {
                        $day = date("Y-m-d", strtotime($report->created_at));
                        $statusName = $report->blotterStatus->name;

                        $idx = array_search($day, $dates["dates"]);
                        
                        $dates["dataset"][$statusName][$idx] = $dates["dataset"][$statusName][$idx] + 1;
                    }
                }
                break;
            default:
                return;
        }
        // switch ($type) {
        //     case "DAYS": {
        //             $startDate = date('Y-m-d', strtotime('-6 days', $now));
        //             $endDate = date('Y-m-d');

        //             $reports = Record::whereBetween("created_at", [$startDate, $endDate])->where('barangay_id', auth()->user()->barangays[0]->id)->with('blotterStatus')->get();

        //             for ($i = 0; $i < 7; $i++) {
        //                 $dates[date("Y-m-d", strtotime("+{$i} days", strtotime($startDate)))] = array();
        //             }

        //             foreach ($reports as $report) {
        //                 $day = date("Y-m-d", strtotime($report->created_at));
        //                 $blotterName = $report->blotterStatus->name;
        //                 if (array_key_exists($day, $dates)) {
        //                     if (array_key_exists($blotterName, $dates[$day])) {
        //                         $dates[$day][$blotterName] = $dates[$day][$blotterName] + 1;
        //                     } else {
        //                         $dates[$day][$blotterName] = 1;
        //                     }
        //                 } else {
        //                     $dates[$day][$blotterName] = 1;
        //                 }
        //             }
        //         }
        //         break;
        //     default:
        //         return;
        // }

        return response()->json(["message" => $dates], 200);
    }
}
