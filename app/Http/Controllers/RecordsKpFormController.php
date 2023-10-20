<?php

namespace App\Http\Controllers;

use App\Actions\GetKpFormMessageActions;
use App\Actions\RecordKpFormActions;
use App\Http\Requests\KpStepOneRequest;
use App\Http\Requests\KpStepTwoRequest;
use App\Http\Requests\RecordsKpFormRequest;
use App\Models\AuditTrail;
use App\Models\IssuedKpForm;
use App\Models\IssuedKpFormField;
use App\Models\IssuedKpFormUpload;
use App\Models\KpForm;
use App\Models\Record;
use App\Models\Summon;
use App\Services\RecordsKpFormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        // Sets the record ID for the whole process
        session(['record_id' => $id]);

        $message = $kpFormAction->getMessageAndRecommendations($service->checkLatestKpForm($id), $id, $kpFormMessageAction);

        $issuedKpForms = IssuedKpForm::where('record_id', $id)->with('kpForm')->get()->mapWithKeys(function ($item, $key) {
            return [$key => $item->kpForm->number];
        });

        return view('pages.kp_forms.create.step-one', ['kpForms' => KpForm::getSelectable()->get(), 'recordId' => $id, 'issuedKpForms' => $issuedKpForms, 'message' => $message]);
    }

    public function postStepOne(KpStepOneRequest $request)
    {
        if (empty(session()->get('issued_kp_form'))) {
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
        if (session()->missing('issued_kp_form')) {
            if (session()->has('record_id')) {
                return redirect()->route('records.kp-forms.get.step-one', ['id' => session('record_id')]);
            } else {
                return redirect()->route('records.index');
            }
        }

        // Gets data from other form which is related to the current form
        $relatedData = $kpFormAction->getRelatedData(session('issued_kp_form')->record_id, session('issued_kp_form')->kp_form_id);

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

        return view('pages.kp_forms.create.step-two', ['issuedForm' => session()->get('issued_kp_form'), 'message' => $message, 'relatedData' => $relatedData]);
    }

    public function postStepTwo(KpStepTwoRequest $request)
    {
        session()->put('kp_fields', $request->validated());
        return redirect()->route('records.kp-forms.success');
    }

    public function stepThree(RecordsKpFormService $service, RecordKpFormActions $action)
    {
        if (session()->missing('issued_kp_form')) {
            if (session()->has('record_id')) {
                return redirect()->route('records.kp-forms.get.step-one', ['id' => session('record_id')]);
            } else {
                return redirect()->route('records.index');
            }
        }

        $nowTimestamp = now();
        $issuedForm = session()->pull('issued_kp_form');

        $latestKpForm = $service->checkLatestKpForm($issuedForm->record_id);
        $latestKpForm = $latestKpForm->kp_form_id ?? 0;

        $issuedForm->save();

        // may naisip pala ko pano kung 16 na yung inissue, tapos may kupal na nagkamali inissue is kpform 12 baka mag + 10. Dapat ba may checker tayo
        // na kunware pag ang latest kp form na is > 12 di na siya mag +10 sa days? medyo magulo explain ko bukas ni note ko lang baka kasi malimutan ko.

        if ($issuedForm->kp_form_id == 12 && $latestKpForm < 12) {
            Record::find($issuedForm->record_id)->update(['kp_deadline' => date('Y-m-d', now()->addDays(15)->timestamp)]);
        }


        // 15 and 16 acts the same settlement
        // 16 is not needed after 15
        if (($issuedForm->kp_form_id == 15 || $issuedForm->kp_form_id == 16) && $latestKpForm < 16) {
            $issuedKpForms = $action->checkIssuedKpForms($issuedForm->record_id, [15]);

            if (!count($issuedKpForms)) {
                Record::find($issuedForm->record_id)->update(['kp_deadline' => date('Y-m-d', now()->addDays(10)->timestamp)]);
            }
        }

        $kpFields = session()->get('kp_fields');
        $kpFieldsArray = array();

        if ($issuedForm->kp_form_id == 8 || $issuedForm->kp_form_id == 9) {
            Summon::updateOrCreate(['record_id' => $issuedForm->record_id, 'kp_form_id' => $issuedForm->kp_form_id])->increment('attempt');
        }

        if (array_key_exists('members', $kpFields)) {
            $kpFields['members'] = array_filter($kpFields['members'], fn ($member) => $member != null);
        }

        foreach ($kpFields as $tag_id => $value) {
            if (!$value) continue;

            if (is_array($value)) {
                foreach ($value as $val) {
                    array_push($kpFieldsArray, ['issued_kp_form_id' => $issuedForm->id, 'tag_id' => $tag_id, 'value' => $val, 'created_at' => $nowTimestamp, 'updated_at' => $nowTimestamp]);
                }

                continue;
            }

            array_push($kpFieldsArray, ['issued_kp_form_id' => $issuedForm->id, 'tag_id' => $tag_id, 'value' => $value, 'created_at' => $nowTimestamp, 'updated_at' => $nowTimestamp]);
        };

        IssuedKpFormField::insert($kpFieldsArray);

        return view('pages.kp_forms.create.success', ['record_id' => $issuedForm->record_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $recordId)
    {
        $validator = Validator::make($request->all(), [
            'kp-form' => 'required|file|mimes:docx,pdf'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $record = Record::find($recordId);
        $file = $validator->validated()['kp-form'];

        if ($file) {
            $filePath = $file->store("kp_forms", "public");

            IssuedKpFormUpload::create([
                'record_id' => $record->id,
                'name' => $file->getClientOriginalName(),
                'path' => $filePath
            ]);
        }

        return response()->json(['message' => 'Success'], 200);
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
    public function edit(string $recordId, string $issuedKpFormId)
    {
        session()->flash('editing_kp_form');
        session()->flash('edit', ['record_id' => $recordId, 'issued_kp_form_id' => $issuedKpFormId]);

        return view('pages.kp_forms.edit', ['issuedKpForm' => IssuedKpForm::where('id', $issuedKpFormId)->with('issuedKpFormFields')->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecordsKpFormRequest $request, string $recordId, string $issuedKpFormId, RecordsKpFormService $service)
    {
        $issuedKpForm = IssuedKpForm::where('id', $issuedKpFormId)->where('record_id', $recordId)->first();
        $record = Record::find($recordId);

        switch ($issuedKpForm->kp_form_id) {
            case 1:
            case 4:
                $service->handleKpFormUpdate($issuedKpForm, $request->validated(), $issuedKpFormId, 'members');
                break;
            case 11:
                $service->handleKpFormUpdate($issuedKpForm, $request->validated(), $issuedKpFormId, 'lupon');
                break;
            case 13:
                $service->handleKpFormUpdate($issuedKpForm, $request->validated(), $issuedKpFormId, 'witness');
                break;
            case 17:
                $service->handleKpFormKeysUpdate($issuedKpForm, $request->validated(), $issuedKpFormId, ['fraud', 'violence', 'intimidation']);
                break;
            default:
                foreach ($request->validated() as $key => $value) {
                    IssuedKpFormField::where('issued_kp_form_id', $issuedKpFormId)->where('tag_id', $key)->update(['value' => $value]);
                }
                break;
        }

        AuditTrail::create([
            'barangay_id' => auth()->user()->barangays[0]->id,
            'login_role_id' => session()->get('login_role'),
            'user_id' => auth()->user()->id,
            'action' => "Updated KP Form #$issuedKpForm->kp_form_id on Blotter Record $record->barangay_blotter_number"
        ]);

        return redirect()->route('records.kp-forms.index', ['record' => $recordId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $recordId, string $issuedKpFormId)
    {
        IssuedKpForm::where('id', $issuedKpFormId)->where('record_id', $recordId)->delete();

        return redirect()->route('records.kp-forms.index', ['record' => $recordId]);
    }
}
