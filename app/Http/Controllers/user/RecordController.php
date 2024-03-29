<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecordRequest;
use App\Models\BlotterStatus;
use App\Models\CivilStatus;
use App\Models\Purok;
use App\Models\Record;
use App\Models\Suspect;
use App\Models\Victim;
use App\Services\RecordsService;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Record::class, 'record');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Record::where('barangay_id', auth()->user()->barangays[0]->id)->where('notification_viewed', 0)->update(['notification_viewed' => 1]);
        $record = Record::select('purok')->orderBy('purok')->get();
        $purokList = array();

        foreach ($record as $key => $value) {
            if (!in_array($value->purok, $purokList)) {
                array_push($purokList, $value->purok);
            }
        }

        sort($purokList);

        $result = Record::getSearchQuery()->with('victim', 'suspect', 'barangays', 'blotterStatus')->orderBy('barangay_blotter_number', 'desc')->paginate($request->rows ?? 10)->withQueryString();
        return view('pages.user.records.blotter-records', ['records' => $result, 'purokList' => $purokList]);
    }

    public function getNewRecords()
    {
        $result = Record::getSearchQuery()->where('notification_viewed', 0)->where('barangay_id', auth()->user()->barangays[0]->id)->count();
        return response()->json($result, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $civilStatus = new CivilStatus();
        $record = new Record();
        $latest = $record->latestRecord(auth()->user()->barangays[0]->id);
        $puroks = auth()->user()->barangays[0]->puroks;

        return view('pages.user.records.create', ['civilStatus' => $civilStatus->getAllCivilStatus(), 'blotterNumber' => $latest ? $latest->barangay_blotter_number + 1 : 1]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecordRequest $request, RecordsService $service)
    {
        $report = new Record();

        $purok = Purok::where('barangay_id', auth()->user()->barangays[0]->id)
            ->where('purok_number', $request->validated('purok'))->first();

        $latest = $report->latestRecord(auth()->user()->barangays[0]->id);
        $report->narrative_file = $service->handleUploadRecording($request->validated('narrative_file'));
        $report->fill([...$request->safe()->except('victim', 'suspect'), 'purok' => $purok->purok_number]);
        $report->barangays()->associate(auth()->user()->barangays[0]->id);
        $report->blotterStatus()->associate(BlotterStatus::find(2));
        $report->barangay_blotter_number = $latest ? $latest->barangay_blotter_number + 1 : 1;
        $report->save();

        $report->victim()->save(new Victim($request->validated('victim')));
        $report->suspect()->save(new Suspect($request->validated('suspect')));

        return redirect()->route('records.show', ['record' => $report->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        session()->forget('issued_kp_form');
        session()->forget('kp_fields');

        $civilStatus = new CivilStatus();

        $hearingDates = Record::where('records.barangay_id', auth()->user()->barangays[0]->id)
            ->where('records.id', $record->id)
            ->join('issued_kp_forms', 'records.id', '=', 'issued_kp_forms.record_id')
            ->join('issued_kp_form_fields', function (JoinClause $join) {
                $join->on('issued_kp_forms.id', '=', 'issued_kp_form_fields.issued_kp_form_id')
                    ->where('issued_kp_form_fields.tag_id', 'hearing');
            })
            ->select('issued_kp_form_fields.value', 'issued_kp_forms.kp_form_id', 'issued_kp_forms.created_at')
            ->latest('issued_kp_forms.created_at')
            ->get();

        return view('pages.user.records.show', ['record' => Record::where('id', $record->id)->with('victim', 'suspect', 'blotterStatus')->first(), 'civilStatus' => $civilStatus->getAllCivilStatus(), 'hearingDates' => $hearingDates]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        $civilStatus = new CivilStatus();
        $blotterStatus = new BlotterStatus();

        return view('pages.user.records.edit', ['record' => Record::where('id', $record->id)->with('victim', 'suspect', 'blotterStatus')->first(), 'civilStatus' => $civilStatus->getAllCivilStatus(), 'blotterStatus' => $blotterStatus->getAllBlotterStatus()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecordRequest $request, Record $record, RecordsService $service)
    {
        $record = Record::find($record->id);

        $record->fill([...$request->safe()->except('victim', 'suspect'), 'purok' => $request->validated('victim.purok')]);
        $record->victim()->update($request->validated('victim'));
        $record->suspect()->update($request->validated('suspect'));

        if ($request->validated('narrative_file') !== null) {
            $record->narrative_file = $service->handleUploadRecording($request->validated('narrative_file'));
        }

        $record->save();

        return redirect()->route('records.show', ['record' => $record->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record->delete();

        return redirect()->route('records.index');
    }

    public function showDestroyed()
    {
        $record = Record::select('purok')->orderBy('purok')->get();
        $purokList = array();

        foreach ($record as $key => $value) {
            if (!in_array($value->purok, $purokList)) {
                array_push($purokList, $value->purok);
            }
        }

        sort($purokList);

        $result = Record::getSearchQuery()->onlyTrashed()->with('victim', 'suspect', 'barangays', 'blotterStatus')->orderBy('barangay_blotter_number', 'desc')->paginate(10)->withQueryString();
        return view("pages.user.records.show-archived", ['records' => $result, 'purokList' => $purokList]);
    }

    public function restore(string $record)
    {
        $result = Record::withTrashed()->where('id', $record)->where('deleted_at', '!=', null)->first();

        if ($result) {
            $result->restore();
        }

        return redirect()->route('records.archived');
    }

    /**
     * Print the specified resource
     */
    public function print(string $record)
    {
        return view('pages.user.records.print', ['record' => Record::where('id', $record)->with('victim', 'suspect')->first()]);
    }
}
