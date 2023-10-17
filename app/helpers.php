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
        8 => [7, 9],
        9 => [7, 8],
        15 => [11],
        18 => [8],
        19 => [9],
        20 => [17],
        // 21 => [18], // Complainant
        // 22 => [19], // Respondent
        23 => [7], // Complainant
        // 24 => [22], // Respondent

        // Forms from 25 to 27 must disable Form 17
        25 => [15, 16],
        27 => [15, 16]
    ];

    return $relations[$kp_form_id] ?? [];
}

function setAlertMessage(string $title, string $description, string $type = 'information')
{
    session()->flash('alert', ['title' => $title, 'description' => $description, 'type' => $type]);
}

function formatUsername(string $username)
{
    $arr = explode("_", $username);
    
    foreach ($arr as $key => $value) {
        if ($key == 0) {
            $arr[$key] = strtoupper($value);
        } else {
            $arr[$key] = ucfirst($value);
        }
    }

    return implode(" ", $arr);
}

function formatName(string $first, string $middle = null, string $last)
{
    $name = "";

    $name .= $first;

    if ($middle !== null) {
        $name .= " " . $middle;
    }

    $name .= " " . $last;

    return $name;
}