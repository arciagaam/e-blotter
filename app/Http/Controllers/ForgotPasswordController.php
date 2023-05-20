<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        # code...
    }

    public function stepOne()
    {
        return view('pages.admin.auth.forgot_password.step-one');
    }

    public function stepTwo()
    {
        return view('pages.admin.auth.forgot_password.step-two');
    }

    public function stepThree()
    {
        return view('pages.admin.auth.forgot_password.step-three');
    }

    public function complete()
    {
        return view('pages.admin.auth.forgot_password.complete');

    }
}
