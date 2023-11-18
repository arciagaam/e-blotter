<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs as MailContactUs;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email:rfc,dns",
            "messageBody" => "required"
        ]);

        if ($validator->fails()) {
            return redirect('/#contact-us')
                ->with('alert', [
                    'title' => "Error",
                    'description' => 'Message not sent.',
                    'type' => 'danger'
                ])
                ->withErrors($validator)
                ->withInput();
        }

        // Add 2FA then uncomment the line below and remove the eblottercs02@gmail.com
        // Mail::to(env("MAIL_USERNAME"))->send(new MailContactUs(...$request->validated()));

        Mail::to("eblottercs02@gmail.com")->send(new MailContactUs(...$validator->validated()));

        return redirect('/#contact-us')
        ->with('alert', [
            'title' => "Success",
            'description' => 'Message successfully sent!',
            'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
