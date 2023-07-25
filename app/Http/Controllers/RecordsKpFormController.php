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
        // dd($message);
        return view('pages.kp_forms.kp_forms', ['record' => $record, 'issuedKpForms' => IssuedKpForm::with('kpForm')->latest()->where('record_id', $record)->get(), 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function stepOne(string $id, RecordsKpFormService $service, RecordKpFormActions $kpFormAction, GetKpFormMessageActions $kpFormMessageAction)
    {
        $message = $kpFormAction->getMessageAndRecommendations($service->checkLatestKpForm($id), $id, $kpFormMessageAction);

        $issuedKpForms = IssuedKpForm::where('record_id', $id)->with('kpForm')->get()->mapWithKeys(function ($item, $key) {
            return [$key => $item->kpForm->number];
        });

        return view('pages.kp_forms.create.step-one', ['kpForms' => KpForm::getSelectable()->get(), 'recordId' => $id, 'issuedKpForms' => $issuedKpForms, 'message' => $message]);
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

    public function stepTwo(RecordsKpFormService $service, RecordKpFormActions $kpFormAction, GetKpFormMessageActions $kpFormMessageAction)
    {
        $recommendedKpForms = collect($kpFormAction->getMessageAndRecommendations($service->checkLatestKpForm(session()->get('issued_kp_form')->record_id), session()->get('issued_kp_form')->record_id, $kpFormMessageAction)['form_ids']);
        $isIssued = IssuedKpForm::where('record_id', session()->get('issued_kp_form')->record_id)->where('kp_form_id', session()->get('issued_kp_form')->kp_form_id)->get()->count();
        $message = array();

        if ($recommendedKpForms->doesntContain(session()->get('issued_kp_form')->kp_form_id)) {
            switch ($isIssued) {
                case true:
                    $message['title'] = 'The KP Form you are trying to issue has already been issued.';
                    $message['description'] = 'If you are certain of your course of action, you can ignore this message.';
                    break;
                case false:
                    $message['title'] = 'The KP Form you are trying to issue is not recommended.';
                    $message['description'] = 'If you are certain of your course of action, you can ignore this message.';
                    break;
            }
        }

        return view('pages.kp_forms.create.step-two', ['issuedForm' => session()->get('issued_kp_form'), 'message' => $message]);
    }

    public function postStepTwo(KpStepTwoRequest $request)
    {
        session()->put('kp_fields', $request->validated());
        return redirect()->route('records.kp-forms.success');
    }

    public function stepThree(RecordsKpFormService $service)
    {
        $nowTimestamp = now();
        $issuedForm = session()->get('issued_kp_form');

        $latestKpForm = $service->checkLatestKpForm($issuedForm->record_id);
        $latestKpForm = $latestKpForm ?? 0;

        $issuedForm->save();

        // may naisip pala ko pano kung 16 na yung inissue, tapos may kupal na nagkamali inissue is kpform 12 baka mag + 10. Dapat ba may checker tayo
        // na kunware pag ang latest kp form na is > 12 di na siya mag +10 sa days? medyo magulo explain ko bukas ni note ko lang baka kasi malimutan ko.

        if( $issuedForm->kp_form_id == 12 && $latestKpForm->kp_form_id < 12) {
            Record::find($issuedForm->record_id)->update(['kp_deadline' => date('Y-m-d', now()->addDays(15)->timestamp)]);
        }

        if($issuedForm->kp_form_id == 16 && $latestKpForm->kp_form_id < 16) {
            Record::find($issuedForm->record_id)->update(['kp_deadline' => date('Y-m-d', now()->addDays(10)->timestamp)]);
        }

        $kpFields = session()->get('kp_fields');
        $kpFieldsArray = array();

        if($issuedForm->kp_form_id == 8 || $issuedForm->kp_form_id == 9) {
            Summon::updateOrCreate(['record_id' => $issuedForm->record_id, 'kp_form_id' => $issuedForm->kp_form_id])->increment('attempt');
        }

        foreach($kpFields as $tag_id => $value) {
            if(!$value) continue;
            
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

        // dd($issuedForm, $tagIds, $forms);

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

