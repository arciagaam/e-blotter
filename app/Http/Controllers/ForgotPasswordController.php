<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordOne;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        # code...
    }

    public function stepOne()
    {
        return view('pages.forgot_password.step-one');
    }

    public function postStepOne(ForgotPasswordOne $request) : RedirectResponse
    {
        return redirect('/forgot-password/step-two');
    }

    public function stepTwo()
    {
        return view('pages.forgot_password.step-two');
    }

    public function stepThree()
    {
        return view('pages.forgot_password.step-three');
    }

    public function complete()
    {
        return view('pages.forgot_password.complete');

    }
}
