<?php

namespace App\Http\Controllers;

use App\Actions\GetKpFormMessageActions;
use App\Actions\RecordKpFormActions;
use App\Http\Requests\KpStepOneRequest;
use App\Http\Requests\KpStepTwoRequest;
use App\Models\IssuedKpForm;
use App\Models\IssuedKpFormField;
use App\Models\KpForm;
use App\Models\Record;
use App\Models\Summon;
use App\Services\RecordsKpFormService;
use Illuminate\Http\Request;

class RecordsKpFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $record, RecordsKpFormService $service, RecordKpFormActions $kpFormAction, GetKpFormMessageActions $kpFormMessageAction)
    {
        $message = $kpFormAction->getMessageAndRecommendations($service->checkLatestKpForm($record), $record, $kpFormMessageAction);
        dd($message);
        return view('pages.kp_forms.kp_forms', ['record' => $record, 'issuedKpForms' => IssuedKpForm::with('kpForm')->where('record_id', $record)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function stepOne(string $id)
    {
        return view('pages.kp_forms.create.step-one', ['kpForms' => KpForm::all(), 'recordId' => $id]);
    }

    public function postStepOne(KpStepOneRequest $request)
    {
        if(empty(session()->get('issued_kp_form'))){
            $issuedForm = new IssuedKpForm();
            $issuedForm->fill($request->validated());
            session()->put('issued_kp_form', $issuedForm);
        } else {
            $issuedForm = session()->get('issued_kp_form');
            $issuedForm->fill($request->validated());
            session()->put('issued_kp_form', $issuedForm);
        }

        return redirect()->route('records.kp-forms.get.step-two');
    }

    public function stepTwo()
    {
        return view('pages.kp_forms.create.step-two', ['issuedForm' => session()->get('issued_kp_form')]);
    }

    public function postStepTwo(KpStepTwoRequest $request)
    {
        session()->put('kp_fields', $request->validated());
        return redirect()->route('records.kp-forms.success');
    }

    public function stepThree()
    {
        $nowTimestamp = now();

        $issuedForm = session()->get('issued_kp_form');
        $issuedForm->save();

        if($issuedForm->kp_form_id == 16) {
            Record::find($issuedForm->record_id)->update(['kp_deadline' => date('Y-m-d', now()->addDays(10)->timestamp)]);
        }

        $kpFields = session()->get('kp_fields');
        $kpFieldsArray = array();

        if($issuedForm->kp_form_id == 8 || $issuedForm->kp_form_id == 9) {
            Summon::updateOrCreate(['record_id' => $issuedForm->record_id, 'kp_form_id' => $issuedForm->kp_form_id])->increment('attempt');
        }

        foreach($kpFields as $tag_id => $value) {
            array_push($kpFieldsArray, ['issued_kp_form_id' => $issuedForm->id, 'tag_id' => $tag_id, 'value' => $value, 'created_at' => $nowTimestamp, 'updated_at' => $nowTimestamp]);
        };

        IssuedKpFormField::insert($kpFieldsArray);
        
        return view('pages.kp_forms.create.success');
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
    public function show(string $recordId, string $issuedKpFormId, RecordKpFormActions $action)
    {
        [$issuedForm, $tagIds, $forms] = $action->handleShow($recordId, $issuedKpFormId);

        return view("kp_forms.kp-form-$issuedForm->kp_form_id", ['issuedForm' => $issuedForm, 'tagIds' => collect($tagIds), 'relatedForms' => $forms]);
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

