<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();

        return view('studentLists', compact('students'));
    }

    public function newStudent(Request $request)
    {
        $request->validate([
            'stdName' => 'required|max:3',
            'stdAge' => 'required|integer',
            'stdGender' => 'nullable',
        ]);

        $input['name'] = $request->stdName;
        $input['age'] = $request->stdAge;
        $input['gender'] = $request->stdGender;
        Students::create($input);

        return redirect()->route('std.index')->with('success', 'Student created successfully.');
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect()->route('auth.index')->with('success', 'Logout successfully');
        } else {
            return redirect()->route('auth.index')->with('error', 'You are not logged in');
        }
    }
}
