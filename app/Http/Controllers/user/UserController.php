<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStorePostRequest;
use App\Models\Barangay;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.user.auth.register.register');
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
    public function store(UserStorePostRequest $request) : RedirectResponse
    {   
        $barangay = $request->safe()->only(['name', 'municipality', 'province']);
        $user = $request->safe()->except(['name', 'municipality', 'province']);
        
        $barangay = Barangay::firstOrCreate($barangay);

        $user['password'] = bcrypt($user['password']);
        $user = User::create($user);

        return redirect('/registration-success');
    }

    public function success()
    {
        return view('pages.user.auth.register.register-confirmation');
    }


}
