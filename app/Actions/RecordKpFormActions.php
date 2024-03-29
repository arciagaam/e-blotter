<?php

namespace App\Actions;

use App\Models\IssuedKpForm;
use App\Models\Record;
use App\Models\Summon;
use Illuminate\Database\Eloquent\Collection;

class RecordKpFormActions
{
    public function handleShow(string $recordId, string $issuedKpFormId)
    {
        $issuedForm = IssuedKpForm::with([
            'issuedKpFormFields',
            'record' => ['victim', 'suspect']
        ])->where('id', $issuedKpFormId)->where('record_id', $recordId)->first();

        $tagIds = new Collection();

        if ($this->hasSimilarTags($issuedForm->kp_form_id)) {
            $tagIds = $issuedForm->issuedKpFormFields->mapToGroups(function ($item, int $key) {
                return [$item['tag_id'] => $item['value']];
            });
        } else {
            $tagIds = $issuedForm->issuedKpFormFields->mapWithKeys(function ($item, int $key) {
                return [$item['tag_id'] => $item['value']];
            });
        }

        $forms = array();
        $relatedForms = IssuedKpForm::relatedKpForms($recordId, getKpRelations($issuedForm->kp_form_id));

        foreach ($relatedForms as $key => $item) {
            if (array_key_exists($item['kp_form_id'], $forms)) {
                $forms[$item['kp_form_id']][$item['tag_id']] = $item['value'];
                continue;
            }

            $forms[$item['kp_form_id']][$item['tag_id']] = $item['value'];
            $forms[$item['kp_form_id']]['id'] = $item['id'];
            $forms[$item['kp_form_id']]['record_id'] = $item['record_id'];
            $forms[$item['kp_form_id']]['kp_form_id'] = $item['kp_form_id'];
            $forms[$item['kp_form_id']]['created_at'] = $item['created_at'];
        }

        return [$issuedForm, $tagIds, $forms];
    }

    public function getRelatedData(string $recordId, string $issuedKpFormId)
    {

        switch ($issuedKpFormId) {
            case "7":
                $record = Record::find($recordId);
                return [
                    "complain" => $record->narrative,
                    "relief" => $record->reliefs
                ];
            default:
                return [];
        }
    }

    public function hasSimilarTags($id): bool
    {
        switch ($id) {
            case 1:
            case 4:
            case 11:
            case 13:
                return true;
            default:
                return false;
        }
    }

    // SHOW MESSAGE AND RECOMMENDATION LOGIC

    public function checkIssuedKpForms(string $record, array $kpFormIds)
    {
        return IssuedKpForm::where('record_id', $record)
            ->whereIn('kp_form_id', $kpFormIds)
            ->get();
    }

    public function checkAttempts(string $record, array $kpFormIds)
    {
        return Summon::where('record_id', $record)
            ->wherein('kp_form_id', $kpFormIds)
            ->where('attempt', '>=', 3)
            ->get();
    }

    public function checkHearingDate(string $record, array $kpFormIds)
    {
        $latestHearingDates = array();

        $issuedKpForms = IssuedKpForm::where('record_id', $record)
            ->where('issued_kp_form_fields.tag_id', 'hearing')
            ->whereIn('kp_form_id', $kpFormIds)
            ->join('issued_kp_form_fields', 'issued_kp_form_fields.issued_kp_form_id', '=', 'issued_kp_forms.id')
            ->orderBy('issued_kp_forms.kp_form_id', 'asc')
            ->latest('issued_kp_forms.created_at')
            ->select('issued_kp_form_fields.value', 'issued_kp_forms.id', 'issued_kp_forms.kp_form_id', 'issued_kp_forms.created_at')
            ->get()
            ->groupBy('kp_form_id');

        if ($issuedKpForms) {
            foreach ($issuedKpForms as $key => $value) {
                $latestHearingDates[$key] = $value[0];
                continue;
            }
        }

        return collect($latestHearingDates);
    }

    public function getMessageAndRecommendations($latestKpForm, string $record, GetKpFormMessageActions $action)
    {
        $recordStatus = Record::where('id', $record)->with('blotterStatus')->first()->blotterStatus->id;

        switch($recordStatus) {
            case 1: return ['message' => 'Case has been settled.', 'recommendations' => null, 'form_ids' => []];
            case 3: return $action->getKpForm23Message();
        }

        if (!isset($latestKpForm->kp_form_id)) {
            return ['message' => 'No KP Forms issued yet', 'recommendations' => 'Issue Form 7', 'form_ids' => [7]];
        }

        switch ($latestKpForm->kp_form_id) {
            case 7:
                return $action->getKpForm7Message();
                break;
            case 8:
            case 9:
                return $action->getKpForm8and9Message($record, $this);
                break;
            case 10:
                return $action->getKpForm10Message();
                break;
            case 11:
                return $action->getKpForm11Message();
                break;
            case 12:
                return $action->getKpForm12Message();
                break;
            case 13:
                return $action->getKpForm13Message();
                break;
            case 14:
                return $action->getKpForm14Message();
                break;
            case 15:
                return $action->getKpForm15Message($record);
                break;
            case 16:
                return $action->getKpForm16Message($record);
                break;
            case 17:
                return $action->getKpForm17Message();
                break;
            case 18:
            case 19:
                return $action->getKpForm18and19Message($record, $this);
                break;
            case 20:
                return $action->getKpForm20Message($record, $this);
                break;
            case 21:
                return $action->getKpForm21Message($record, $this);
                break;
            case 22:
                return $action->getKpForm22Message($record, $this);
                break;
            case 23:
                return $action->getKpForm23Message();
                break;
            case 24:
                return $action->getKpForm24Message();
                break;
            case 25:
                return $action->getKpForm25Message();
                break;
            case 27:
                return $action->getKpForm27Message();
                break;
            default:
                return [];
        }
    }
}
