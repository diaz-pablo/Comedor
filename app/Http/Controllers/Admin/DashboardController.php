<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $quantityActiveStudents = Student::where('status', Student::ACTIVE)->count();
        $quantityPendingStudents = Student::where('status', Student::PENDING)->count();
        $quantitySuspendedStudents = Student::where('status', Student::SUSPENDED)->count();

        return view('admin.dashboard', compact('quantityActiveStudents', 'quantityPendingStudents', 'quantitySuspendedStudents'));
    }
}
