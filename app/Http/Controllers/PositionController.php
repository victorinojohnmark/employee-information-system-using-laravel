<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{
    public function update(Position $position) {
        $data = $this->validatedData();
        $position->update($data);

        return redirect('/employee-profiles/department-position')->with('success', 'Position Updated');
    }

    public function store() {
        $data = $this->validatedData();
        Position::create($data);

        return redirect('/employee-profiles/department-position')->with('success', 'Position Created');
    }

    protected function validatedData() {
        $request = request()->validate([
            'position_title' => 'required',
            'department_id' => 'required',
            'position_level' => 'required'
        ]);

        return $request;
    }
}
