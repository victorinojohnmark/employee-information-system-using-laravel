<!-- Position Create Modal -->
<div class="modal fade" id="createPosition" tabindex="-1" role="dialog"
    aria-labelledby="profileModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Create New Position</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!! Form::open(['url' => '/employee-profiles/department-position/position', 'method' => 'post']) !!}
                        {{ Form::label('position_title', 'Department Name', ['class' => 'm-2']) }}
                       {{Form::text('position_title', old('position_title'), ['class' => 'form-control m-2', 'placeholder' => 'e.g. IT Supervisor', 'autocomplete' => 'off'])}}

                       {{ Form::label('department_id', 'Department', ['class' => 'm-2']) }}
                       {{ Form::select('department_id', $arrayDepartment, null, ['class' => 'form-control m-2']) }}

                       {{ Form::label('position_level', 'Position Level', ['class' => 'm-2']) }}
                       {{ Form::select('position_level', $arrayPositionLevel, null, ['class' => 'form-control m-2']) }}

                       {{ Form::submit('Create', ['class' => 'btn btn-primary m-2']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>