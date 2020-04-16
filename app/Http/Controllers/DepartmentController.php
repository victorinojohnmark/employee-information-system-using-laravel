<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\PositionLevel;
// use App\Position;

class DepartmentController extends Controller
{
    //
    public function index() {
        // $positions = Position::with('position_levels')->get();
        $departments = Department::with(['positions' => function($query){
            $query
            ->join('position_levels', 'position_levels.level_value', '=', 'positions.position_level')
            ->select('positions.*', 'position_levels.level_name', 'position_levels.level_value');
        }])->get();

        $position_levels = PositionLevel::get()->sortBy('level_value');

        // Generate Arrays of Department with keypair value for select input
        $arrayDepartment = array();
        foreach ($departments as $department) {
            $arrayDepartment[$department->id] = $department->dept_name;
        }

        //Generate Arrays of Position Level for select input
        $arrayPositionLevel = array();
        foreach ($position_levels as $position_level) {
            $arrayPositionLevel[$position_level->level_value] = $position_level->level_name;
        }

        // dd($arrayDepartment);
        return view('employee-profiles.department-position', ['departments' => $departments, 'position_levels' => $position_levels, 'arrayDepartment' => $arrayDepartment, 'arrayPositionLevel' => $arrayPositionLevel]);
        
    }

    public function store() {
        $data = $this->validatedData();
        Department::create($data);

        return redirect('/employee-profiles/department-position')->with('success', 'Department Created');
    }

    protected function validatedData() {
        $request = request()->validate([
            'dept_name' => 'required',
            'order_index' => 'required'
        ]);

        return $request;
    }
}
