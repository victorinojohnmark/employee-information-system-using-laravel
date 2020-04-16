<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PositionLevel;

class PositionLevelController extends Controller
{
    public function index() {
        $position_levels = PositionLevel::all();
        return view('employee-profiles.position-levels.index', ['position_levels' => $position_levels]);
    }

    public function store() {
        $data = $this->validatedData();

        PositionLevel::create($data);

        return redirect('/employee-profiles/position-levels')->with('success', 'Position Level Added');
    }

    public function validatedData() {
        return request()->validate([
            'name' => 'required',
            'index_level' => 'required',
        ]);
    }
}
