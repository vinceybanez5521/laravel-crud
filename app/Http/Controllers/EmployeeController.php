<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Employee::paginate(10);
        return view('employee.index', ['employees' => $data]);
    }

    public function show($id)
    {
        $data = Employee::findOrFail($id);
        return view('employee.show', ['employee' => $data]);
    }

    public function create()
    {
        $positions = Position::all();
        return view('employee.create', ['positions' => $positions]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'position_id' => ['required'],
            'salary' => ['required'],
        ]);

        if (!empty($request->input('hobbies'))) {
            $validated['hobbies'] = implode(',', $request->input('hobbies'));
        }

        // dd($validated);

        Employee::create($validated);
        return redirect()->route('employee.index')->with('success', 'Employee Created');
    }

    public function edit($id)
    {
        $positions = Position::all();
        $employee = Employee::findOrFail($id);
        return view('employee.edit', ['positions' => $positions, 'employee' => $employee]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'position_id' => ['required'],
            'salary' => ['required'],
        ]);

        if (!empty($request->input('hobbies'))) {
            $validated['hobbies'] = implode(',', $request->input('hobbies'));
        } else {
            $validated['hobbies'] = null;
        }

        // dd($validated);

        $employee = Employee::where('id', $id)->first();
        $employee->update($validated);
        return redirect()->route('employee.show', ['id' => $id])->with('success', 'Employee Updated');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Employee::destroy($id);
        return redirect()->route('employee.index')->with('success', 'Employee Deleted');
    }
}
