@extends('layouts.app')

@section('content')

<h3 class="d-inline">List of Position Level</h3>
<a href="#" class="btn btn-primary float-right ml-2" data-toggle="modal" data-target="#createPositionLevel">Create
    New</a>
@include('inc.modals.position-level-create')
<hr>
<table class="table">
    <thead class="thead-light">
        <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">Position Level Name</th>
            <th scope="col">Level</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($position_levels as $position_level)
            <tr>
                {{-- <td>{{ $loop->index + 1 }}</td> --}}
                <td>{{ $position_level->name }}</td>
                <td>{{ $position_level->index_level }}</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#createPositionLevel{{ $position_level->id }}" class="btn btn-success btn-sm">Update</a>

                    <div class="modal fade" id="createPositionLevel{{ $position_level->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="profileModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileModalLabel">Position Level</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        {{-- {!! Form::open(['url' => '/employee-profiles/position-levels', 'method' => 'post']) !!} --}}
                                        {{-- {{ dd($position_level) }} --}}
                                        {{-- @include('inc.form.position-level') --}}
                                        {{-- {!! Form::close() !!} --}}
                                        <form action="/employee-profiles/position-levels" method="post">
                                            <div class="row">
                                                <div class="form-group col-md-6 mt-2">
                                                    <label for="name">Position Level Name</label>
                                                    <input type="text" name="name" value="{{ $position_level->name }}" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6 mt-2">
                                                    <label for="index_level">Index Level</label>
                                                    <input type="number" name="index_level" value="{{ $position_level->index_level }}" class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
{{-- @include('inc.modals.position-level-create') --}}

@endsection
