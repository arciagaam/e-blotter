<?php

// use App\Models\LoginTrail;

// function addToLoginTrail($login_role_id)
// {
//     $loginTrail = New LoginTrail();
//     $loginTrail->barangays()->associate(auth()->user()->barangays[0]->id);
//     $loginTrail->users()->associate(auth()->user()->id);
//     $loginTrail->loginroles()->associate($login_role_id);
//     $loginTrail->save();
// }

function getKpRelations($kp_form_id)
{
    $relations = [
        // '8' => ['7', '9'],
        // '9' => ['7', '8'],
        // '18' => ['8'],
        // '19' => ['9'],
        // '25' => ['15', '16'],
        8 => [7, 9],
        9 => [7, 8],
        15 => [11],
        18 => [8],
        19 => [9],
        20 => [17, 18, 19],
        21 => [20],
        22 => [20],
        23 => [16],
        25 => [15, 16],
    ];

    return $relations[$kp_form_id] ?? [];
}

function setAlertMessage(string $title, string $description, string $type = 'information') 
{
    session()->flash('alert', ['title' => $title, 'description' => $description, 'type' => $type]);
}