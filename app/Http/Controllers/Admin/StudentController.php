<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreStudentRequest;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $students = Student::with('user')->get();

            return datatables()
                    ->of($students)
                    ->addColumn('status', 'admin.students.partials.status')
                    ->addColumn('actions', 'admin.students.partials.actions')
                    ->rawColumns(['status', 'actions'])
                    ->toJson();
        }

        return view('admin.students.index');
    }

    public function create()
    {
        return view('admin.students.create', [
            'student' => new Student
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        $alertColor = 'success';
        $alertTitle = '¡Hurra! Todo salió bien, ';
        $alertMessage = 'el estudiante ha sido creado exitosamente.';

        DB::beginTransaction();
        try {
            $user = User::create($request->only(['surname', 'name', 'email']));

            $request->merge(['user_id' => $user->id]);

            Student::create($request->only(['user_id', 'document_number', 'status']));

            DB::commit();
        } catch (\Exception $exception) {
            $alertColor = 'danger';
            $alertTitle = '¡Ups! Algo salió mal, ';
            $alertMessage = $exception->getMessage();

            DB::rollBack();
        }

        session()->flash('alert', [$alertColor, $alertTitle, $alertMessage]);
        return redirect()->route('admin.students.index');
    }

    public function show(Student $student)
    {
        $student->load('user')->get();

        return view('admin.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $student->load('user')->get();

        return view('admin.students.edit', compact('student'));
    }


    public function update(StoreStudentRequest $request, Student $student)
    {
        $alertColor = 'success';
        $alertTitle = '¡Hurra! Todo salió bien, ';
        $alertMessage = 'los datos del estudiante han sido actualizados exitosamente.';

        DB::beginTransaction();
        try {
            $student->update($request->only(['document_number', 'status']));
            $student->user->update($request->only(['surname', 'name', 'email']));

            DB::commit();
        } catch (\Exception $exception) {
            $alertColor = 'danger';
            $alertTitle = '¡Ups! Algo salió mal, ';
            $alertMessage = $exception->getMessage();

            DB::rollBack();
        }

        session()->flash('alert', [$alertColor, $alertTitle, $alertMessage]);
        return redirect()->route('admin.students.index');
    }

    public function destroy(Student $student)
    {
        $alertColor = 'success';
        $alertTitle = '¡Hurra! Todo salió bien, ';
        $alertMessage = 'el estudiante ha sido eliminado exitosamente.';

        DB::beginTransaction();
        try {
            $student->delete();
            $student->user->delete();
            // TODO: Eliminar su imágen si es que no tiene la imágen por defecto.
            // TODO: Seteearle en la DB la URL de la imágen por defecto.
            // TODO: Hacer esto en el observer.
            DB::commit();
        } catch (\Exception $exception) {
            $alertColor = 'danger';
            $alertTitle = '¡Ups! Algo salió mal, ';
            $alertMessage = $exception->getMessage();

            DB::rollBack();
        }

        session()->flash('alert', [$alertColor, $alertTitle, $alertMessage]);
        return redirect()->route('admin.students.index');
    }

}
