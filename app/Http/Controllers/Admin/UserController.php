<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $user = new User;

        return view('admin.users.create', compact('user'));
    }

    public function store(Request $request)
    {
        //
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
