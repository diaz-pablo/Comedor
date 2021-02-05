<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        //return $request->all();
    }

    public function destroy(User $user)
    {
        //
    }
}
