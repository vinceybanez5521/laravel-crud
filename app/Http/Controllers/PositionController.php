<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $data = Position::paginate(10);
        return view('position.index', ['positions' => $data]);
    }
    
    public function create() {
        return view('position.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'unique:positions']
        ]);

        Position::create($validated);    
        return redirect()->route('position.index')->with('success', 'Position Created');
    }

    public function edit($id) {
        $data = Position::findOrFail($id);
        return view('position.edit', ['position' => $data]);
    }

    public function update(Request $request) {
        $id = $request->post('id');

        $validated = $request->validate([
            'name' => ['required', 'unique:positions,name,' . $id]
        ]);

        $position = Position::where('id', $id)->first();
        $position->update($validated);
        return redirect()->route('position.index')->with('success', 'Position Updated');
    }

    public function destroy(Request $request) {
        $id = $request->post('id');
        Position::destroy($id);
        return redirect()->route('position.index')->with('success', 'Position Deleted');
    }
}
