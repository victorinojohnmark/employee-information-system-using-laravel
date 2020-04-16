@extends('layouts.app')

@section('content')
<h3 class="d-inline">Department & Position List</h3>
<a href="#" class="btn btn-primary float-right ml-2" data-toggle="modal" data-target="#createDepartment">Create
    Department</a>
@include('inc.modals.position-create')
<a href="#" class="btn btn-primary float-right ml-2" data-toggle="modal" data-target="#createPosition">Create
    Position</a>
@include('inc.modals.department-create')
<hr>
<ul class="list-group list-group-flush list list-unstyled">
    @foreach($departments as $department)
        <li>
            <a href="#departmentChild{{ $department->dept_name }}" data-toggle="collapse"
                class="list-group-item list-group-item-action bg-success list-group-toggle text-white">
                <i class="fas fa-chevron-circle-right"></i> {{ $department->dept_name }}
            </a>
            <ul class="list-group list-group-flush collapse" id="departmentChild{{ $department->dept_name }}">
                
                    <li class="list-group-item">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Position Title</th>
                                    <th>Position Level</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($department->positions as $position)
                                <tr>
                                    <form action="/employee-profiles/department-position/position/{{ $position->id }}" class="form-inline" method="post">
                                        @method('patch')
                                        @csrf
                                    <td><input type="text" name="position_title" value="{{ $position->position_title }}"
                                        class="form-control form-control-sm mr-2" autocomplete="off">
                                        <input type="hidden" name="department_id" value="{{ $position->department_id }}">
                                        
                                    </td>
                                    <td><select class="custom-select custom-select-sm mr-2" name="position_level">
                                        <option value="{{ $position->level_value }}">{{ $position->level_name }}</option>
        
                                        @foreach($position_levels as $position_level)
                                            <option value="{{ $position_level->level_value }}">
                                                {{ $position_level->level_name }}</option>
                                        @endforeach
                                    </select></td>
                                    <td><button type="submit" class="btn btn-dark btn-sm">Update</button> <a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </li>

                
            </ul>
        </li>
    @endforeach
</ul>


@endsection
