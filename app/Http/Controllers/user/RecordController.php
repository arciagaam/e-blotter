<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecordRequest;
use App\Models\BlotterStatus;
use App\Models\CivilStatus;
use App\Models\Record;
use App\Models\Suspect;
use App\Models\Victim;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.user.records.blotter-records', ['records' => Record::where('barangay_id', auth()->user()->barangays[0]->id)->with('victim', 'suspect', 'barangays', 'blotterStatus')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $civilStatus = new CivilStatus();

        return view('pages.user.records.create', ['civilStatus' => $civilStatus->getAllCivilStatus(), 'blotterNumber' => Record::count() + 1]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecordRequest $request)
    {
        $report = new Record();

        $report->fill($request->safe()->except('victim', 'suspect'));
        $report->barangays()->associate(auth()->user()->barangays[0]->id);
        $report->blotterStatus()->associate(BlotterStatus::find(2));
        $report->save();

        $report->victim()->save(new Victim($request->validated('victim')));
        $report->suspect()->save(new Suspect($request->validated('suspect')));


        return redirect()->route('records.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        $civilStatus = new CivilStatus();

        return view('pages.user.records.show', ['record' => Record::where('id', $record->id)->with('victim', 'suspect', 'blotterStatus')->first(), 'civilStatus' => $civilStatus->getAllCivilStatus()]);
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
    public function update(RecordRequest $request, Record $record)
    {
        $record = Record::find($record->id);
        
        $record->update($request->safe()->except('victim', 'suspect'));
        $record->victim()->update($request->validated('victim'));
        $record->suspect()->update($request->validated('suspect'));

        return redirect()->route('records.show', ['record' => $record->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        //
    }
}