<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStorePostRequest;
use App\Models\Barangay;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.user.auth.register.register");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStorePostRequest $request)
    {
        // Users
        $user = $request->safe()->except(["captain_first_name", "captain_last_name", "name", "logo"]);
        $user["password"] = bcrypt($user["password"]);
        $user = User::create($user);

        // Barangay
        $barangay = Barangay::firstOrCreate($request->safe()->only(["captain_first_name", "captain_last_name", "name"]));
        $filePath = $request->file("logo")->store("logos", "public");
        $barangay["logo"] = $filePath;

        // Purok
        $purokList = $request->safe(["purok"]);
        $barangayPurokList = [];
        foreach($purokList['purok'] as $purokNumber => $purok) {
            if ($purok == null || $purok == "") {
                continue;
            }

            $barangayPurokList[] = [
                'purok_number' => $purokNumber,
                'name' => $purok
            ];
        }

        $barangay->puroks()->createMany($barangayPurokList);
        $user->barangays()->save($barangay);
        $user->roles()->save(Role::find(2));

        return redirect("/registration-success");
    }

    public function success()
    {
        return view("pages.user.auth.register.register-confirmation");
    }
}
