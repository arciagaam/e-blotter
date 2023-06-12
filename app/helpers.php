<?php

use App\Models\LoginTrail;

function addToLoginTrail($login_role_id) {
    $loginTrail = New LoginTrail();
    $loginTrail->barangays()->associate(auth()->user()->barangays[0]->id);
    $loginTrail->users()->associate(auth()->user()->id);
    $loginTrail->loginroles()->associate($login_role_id);
    $loginTrail->save();
}

function getKpRelations($kp_form_id)
{
    $relations = [
        '8' => ['7'],
        '9' => ['7', '8'],
        '18' => ['8'],
        '19' => ['8'],
        '25' => ['16']
    ];

    return $relations[$kp_form_id] ?? [];
}