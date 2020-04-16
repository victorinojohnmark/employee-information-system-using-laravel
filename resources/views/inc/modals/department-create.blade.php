<!-- Department Create Modal -->
<div class="modal fade" id="createDepartment" tabindex="-1" role="dialog"
    aria-labelledby="profileModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Create New Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!! Form::open(['url' => '/employee-profiles/department-position/department', 'method' => 'post']) !!}
                        {{ Form::label('dept_name', 'Department Name', ['class' => 'm-2']) }}
                       {{ Form::text('dept_name', old('dept_name'), ['class' => 'form-control m-2', 'placeholder' => 'e.g. Finance/Accounting', 'autocomplete' => 'off'])}}

                       {{ Form::label('position_level', '', ['class' => 'm-2']) }}
                       {{ Form::number('position_level', old('position_level'), ['class' => 'form-control m-2', 'placeholder' => 'No.', 'autocomplete' => 'off'])}}
                       {{ Form::submit('Create', ['class' => 'btn btn-primary m-2']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>