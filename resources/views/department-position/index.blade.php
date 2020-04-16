@extends('layouts.app')

@section('content')

{{-- {{dd($departments, $positions)}} --}}
<div class="row">
    <div class="col-md-6">
        <h5 class="bg-secondary p-2 my-2 text-white">Departments</h5>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Dept. Name</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $dept)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $dept->dept_name }}</td>
                        <td><a href="#" class="btn btn-success btn-sm">Update</a></td>
                    </tr>
                @endforeach
            </tbody>


        </table>
    </div>
    <div class="col-md-6">
        <h5 class="bg-secondary p-2 my-2 text-white">Positions</h5>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Position Title</th>
                    <th>Department</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($positions as $position)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $position->position_title }}</td>
                        <td>{{ $position->department->dept_name }}</td>
                        <td><a href="#" class="btn btn-success btn-sm">Update</a></td>
                    </tr>
                @endforeach
            </tbody>


        </table>
    </div>
</div>


@endsection
