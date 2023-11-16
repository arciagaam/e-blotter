<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Mail\Verification;
use App\Models\Barangay;
use App\Models\User;
use App\Models\Purok;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = User::nonAdmin()->when(request()->search, function ($q) {
            $q->where('first_name', 'like', '%' . request()->search . '%')
                ->orWhere('last_name', 'like', '%' . request()->search . '%')
                ->orWhereHas('barangays', function (Builder $query) {
                    $query->where('name', 'like', '%' . request()->search . '%');
                });
        })->get();

        User::where('notification_viewed', 0)->update(['notification_viewed' => 1]);

        return view('pages.admin.accounts.accounts', ['accounts' => $accounts]);
    }

    public function getNewAccounts()
    {
        return response()->json(User::where('notification_viewed', 0)->count(), 200);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return response()->json(User::find($id), 200);
        return response()->json(User::with('barangays')->find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $account = User::where('id', $id)->with('barangays.puroks')->first();
        return view('pages.admin.accounts.edit', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $account)
    {
        $validator = Validator::make($request->all(), [
            'captain_first_name' => 'required',
            'captain_last_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'sometimes',
            'confirm_password' => 'sometimes|required_with:password|same:password',
            'username' => [
                'required',
                Rule::unique('users')->ignore($account)
            ],
            'contact_number' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($account)
            ],
            'name' => [
                'required',
                Rule::unique('barangays', 'name')->ignore($account->barangays[0]->id)
            ],
            'logo' => 'nullable|image|max:3072|mimes:jpg,jpeg,png',
            'purok' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.accounts.edit', ['account' => $account])
                ->withErrors($validator)
                ->withInput();
        }

        $userRequest = $validator->safe()->except(["captain_first_name", "captain_last_name", "name", "logo", "purok", "confirm_password"]);
        $barangayRequest = $validator->safe()->only(["captain_first_name", "captain_last_name", "name", "logo"]);
        $purokRequest = $validator->safe()->only(["purok"]);


        if ($userRequest['password'] === null) {
            unset($userRequest['password']);
        } else {
            $userRequest["password"] = bcrypt($userRequest["password"]);
        }

        foreach ($purokRequest["purok"] as $id => $purok) {
            Purok::findOrFail($id)->update(['name' => $purok]);
        }

        User::findOrFail($account->id)->update($userRequest);
        Barangay::findOrFail($account->barangays[0]->id)->update($barangayRequest);

        return redirect()->route('admin.accounts.index');
    }
    //  public function update(Request $request, User $account)
    //  {
    //      dd($request->all());
    //      $validator = Validator::make($request->all(), [
    //          'first_name' => 'required',
    //          'last_name' => 'required',
    //          'username' => [
    //              'required',
    //              Rule::unique('users')->ignore($account)
    //          ],
    //          'barangays' => [
    //              'required',
    //              Rule::unique('barangays', 'name')->ignore($account->barangays[0]->id)
    //          ],
    //          'contact_number' => 'required',
    //          'email' => [
    //              'required',
    //              Rule::unique('users', 'email')->ignore($account)
    //          ],
    //          'logo' => 'nullable|image|max:3072|mimes:jpg,jpeg,png'
    //      ]);

    //      if ($validator->fails()) {
    //          return response()->json($validator->errors(), 422);
    //      }

    //      $barangayUpdates = [
    //          'name' => $validator->safe()->only(['barangays'])['barangays'],
    //      ];

    //      if (!empty($validator->safe(['logo']))) {
    //          $filePath = $request->file("logo")->store("logos", "public");
    //          $barangayUpdates['logo'] = $filePath;
    //      }

    //      User::findOrFail($account->id)->update($validator->safe()->except(['barangays']));
    //      Barangay::findOrFail($account->barangays[0]->id)->update($barangayUpdates);

    //      return response()->json(['message' => 'Success'], 200);
    //  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete($id);

        return redirect()->route('admin.accounts.index');
        // return response()->json(['message' => 'Success'], 200);
    }

    public function showDestroyed()
    {
        $accounts = User::nonAdmin()->onlyTrashed()->when(request()->search, function ($q) {
            $q->where('first_name', 'like', '%' . request()->search . '%')
                ->orWhere('last_name', 'like', '%' . request()->search . '%')
                ->orWhereHas('barangays', function (Builder $query) {
                    $query->where('name', 'like', '%' . request()->search . '%');
                });
        })->get();

        return view('pages.admin.accounts.show-archived', ['accounts' => $accounts]);
    }

    public function restore(string $account)
    {
        $result = User::withTrashed()->where('id', $account)->first();

        if ($result) {
            $result->restore();
        }

        return redirect()->route('admin.accounts.index');
    }

    public function verify(Request $request)
    {
        $user = User::find($request->id);

        $user->fill(['verified_at' => now()]);
        $user->save();

        Mail::to($user->email)->send(new Verification($user));

        return response()->json(['message' => 'Success'], 200);
    }
}
