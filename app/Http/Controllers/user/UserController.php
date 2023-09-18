<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStorePostRequest;
use App\Models\Barangay;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $user = $request->safe()->except(["name", "logo"]);
        $user["password"] = bcrypt($user["password"]);
        $user = User::create($user);

        // Barangay
        $barangay = Barangay::firstOrCreate($request->safe()->only(["name"]));
        $filePath = $request->file("logo")->store("logos", "public");
        $barangay["logo"] = $filePath;

        $user->barangays()->save($barangay);
        $user->roles()->save(Role::find(2));

        return redirect("/registration-success");
    }

    public function success()
    {
        return view("pages.user.auth.register.register-confirmation");
    }
}
