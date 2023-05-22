<?php

use App\Models\LoginTrail;

function addToLoginTrail($login_role_id) {
    $loginTrail = New LoginTrail();
    $loginTrail->barangays()->associate(auth()->user()->barangays[0]->id);
    $loginTrail->users()->associate(auth()->user()->id);
    $loginTrail->loginroles()->associate($login_role_id);
    $loginTrail->save();
}