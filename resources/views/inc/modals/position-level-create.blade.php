<!-- Profile Modal -->
<div class="modal fade" id="createPositionLevel" tabindex="-1" role="dialog"
    aria-labelledby="profileModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!! Form::open(['url' => '/employee-profiles/position-levels', 'method' => 'post']) !!}

                        @include('inc.form.position-level')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>