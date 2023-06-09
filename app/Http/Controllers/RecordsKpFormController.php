<?php

namespace App\Http\Controllers;

use App\Http\Requests\KpStepOneRequest;
use App\Http\Requests\KpStepTwoRequest;
use App\Models\IssuedKpForm;
use App\Models\IssuedKpFormField;
use App\Models\KpForm;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordsKpFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $record)
    {
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

        $kpFields = session()->get('kp_fields');
        $kpFieldsArray = array();

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
    public function show(string $recordId, string $issuedKpFormId)
    {

        $issuedForm = issuedKpForm::with([
        'issuedKpFormFields', 
        'record' => ['victim', 'suspect']
        ])->where('id', $issuedKpFormId)->where('record_id', $recordId)->first();
        
        $tagIds = $issuedForm->issuedKpFormFields->mapWithKeys(function ($item, int $key) {
            return [$item['tag_id'] => $item['value']];
        });

        $relatedForms = IssuedKpForm::relatedKpForms($recordId, getKpRelations($issuedForm->kp_form_id))->mapToGroups(function ($item, int $key) {     
            return [$item['kp_form_id'] => [$item['tag_id'] => $item['value']]];
        });


        dd($relatedForms);
        return view("kp_forms.kp-form-$issuedForm->kp_form_id", ['issuedForm' => $issuedForm, 'tagIds' => collect($tagIds), 'relatedForms' => $relatedForms]);
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
