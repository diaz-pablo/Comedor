<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $students = User::select('id', 'document_number', 'surname', 'name', 'email')
                ->where('role_id', Role::STUDENT_ID)
                ->get();

            return datatables()
                    ->of($students)
                    ->addColumn('actions', 'admin.users.partials.actions')
                    ->rawColumns(['actions'])
                    ->toJson();
        }

        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create', [
            'user' => new User
        ]);
    }

    public function store(Request $request)
    {
            $request->validate([
                'document_number' => 'bail|required|integer|digits:8|unique:users',
                'surname' => 'bail|required|string|max:255',
                'name' => 'bail|required|string|max:255',
                'email' => 'bail|required|email|unique:users',
                'status' => 'bail|required',
            ]);

            $password = Str::random(12);

            $request->merge(['password' => $password]);

            User::create($request->all());

            // TODO: Enviar email con usuario y contraseña.

            session()->flash('alert', ['success', '¡Oh yeah!', 'El usuario ha sido creado satisfactoriamente.']);
            return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
