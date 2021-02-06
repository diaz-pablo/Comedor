<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Notifications\SendPasswordToUpdateUser;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()
                    ->of(User::students()->get())
                    ->addColumn('actions', 'admin.users.partials.actions')
                    ->rawColumns(['actions'])
                    ->toJson();
        }

        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create', ['user' => new User]);
    }

    public function store(StoreUserRequest $request)
    {
            User::create($request->all());

            session()->flash('alert', ['success', '¡Hurra! Todo salió bien, ', 'el usuario ha sido creado exitosamente.']);
            return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }


    public function update(StoreUserRequest $request, User $user)
    {
        if ($request->has('generate_new_password')) {
            $newPassword = Str::random(12);
            $request->merge(['password' => $newPassword]);

        }

        $user->update($request->all());

        if ($request->has('generate_new_password')) {
            $user->notify(new SendPasswordToUpdateUser($newPassword));
        }

        session()->flash('alert', ['success', '¡Hurra! Todo salió bien, ', 'el usuario ha sido actualizado exitosamente.']);
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        //
    }
}
