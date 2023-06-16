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
}
