<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckOTPRequest;
use App\Http\Requests\ForgotPasswordOne;
use App\Http\Requests\ForgotPasswordThree;
use App\Mail\OTP as MailOTP;
use App\Models\OTP;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

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
        $user = User::where('email', $request->email)->first();
        
        if(!$user) {
            return back()->with('error', 'Email not found');
        }
        
        session()->put('user', $user);
        $otp = rand(100000, 999999);

        OTP::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id, 'token' => $otp, 'expiration' => 3600]);
        Mail::to('miguelarciagaa@gmail.com')->send(new MailOTP($otp));

        return redirect('/forgot-password/step-two');
    }

    public function stepTwo()
    {
        return view('pages.forgot_password.step-two');
    }

    public function postStepTwo(CheckOTPRequest $request) : RedirectResponse
    {
        $user = session()->get('user');
        $validated = $request->validated();

        $otp = OTP::where([['user_id', '=', $user->id], ['token', '=', $validated['token']]])->first();

        if(!$otp) {
            return back()->with('error', 'Invalid OTP, Try again.');
        }

        return redirect('/forgot-password/step-three');
    }

    public function stepThree()
    {
        
        return view('pages.forgot_password.step-three');
    }

    public function postStepThree(ForgotPasswordThree $request): RedirectResponse
    {
        $user = session()->get('user');
        User::find($user->id)->update(['password' => bcrypt($request['password'])]);
        return redirect('/forgot-password/complete');
    }

    public function complete()
    {
        return view('pages.forgot_password.complete');
    }
}
