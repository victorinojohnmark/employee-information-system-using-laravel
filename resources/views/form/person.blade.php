{!! Form::open(['url' => 'person', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
{{ Form::token() }}
<div class="row">
    <div class="col-md-2 col-sm-12">
        <img src="/img/avatar.jpg" id="profile-picture" class="img-fluid rounded" alt="Avatar Image">
        {{ Form::file('profile_image', ['class' => 'form-control-file d-block mt-2', 'accept'=> 'image/x-png,image/gif,image/jpeg']) }}
        {{ Form::hidden('old_profile_image', old('old-profile-picture')) }}
        <hr>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-block mt-3']) }}
        {{ Form::reset('Reset', ['class' => 'btn btn-danger btn-block mt-2']) }}
    </div>
    <div class="col-md-10 col-sm-12">
        <div class="row">
            <h3 class="col-md-12 mt-2">Basic Information</h3>
            <div class="form-group col-md-4 mt-2">
                {{ Form::label('lastname', 'Last Name') }}
                {{ Form::text('lastname', old('lastname'), ['class' => 'form-control', 'placeholder' => 'Dela Cruz', 'autocomplete' => 'off']) }}
            </div>
            <div class="form-group col-md-4 mt-2">
                {{ Form::label('firstname', 'First Name') }}
                {{ Form::text('firstname', old('firstname'), ['class' => 'form-control', 'placeholder' => 'Miguel', 'autocomplete' => 'off']) }}
            </div>
            <div class="form-group col-md-4 mt-2">
                {{ Form::label('middlename', 'Middle Name') }}
                {{ Form::text('middlename', old('middlename'), ['class' => 'form-control', 'placeholder' => 'Perez', 'autocomplete' => 'off']) }}
            </div>
            <div class="form-group col-md-4 mt-2">
                {{ Form::label('birthdate', 'Birth Date') }}
                {{ Form::date('birthdate',  old('birthdate'), ['class' => 'form-control', 'placeholder' => 'Perez', 'autocomplete' => 'off']) }}
            </div>
            <div class="form-group col-md-4 mt-2">
                {{ Form::label('image', 'Signature File') }}
                {{ Form::file('signature_image', ['class' => 'form-control-file', 'accept'=>"image/x-png,image/gif,image/jpeg"]) }}
                {{ Form::hidden('old_signature_image', old('old-signature-file')) }}
            </div>

            <small class="col-md-12 text-black-50"><i class="fas fa-info-circle"></i> Please leave 'N/A' if data not
                available</small>
            <div class="form-group col-md-3 mt-2">
                {{ Form::label('sss_id', 'SSS ID') }}
                {{ Form::text('sss_id', old('sss_id'), ['class' => 'form-control', 'autocomplete' => 'off']) }}
            </div>
            <div class="form-group col-md-3 mt-2">
                {{ Form::label('tin_id', 'TIN ID') }}
                {{ Form::text('tin_id', old('tind_id'), ['class' => 'form-control', 'autocomplete' => 'off']) }}
            </div>
            <div class="form-group col-md-3 mt-2">
                {{ Form::label('philhealth_id', 'PhilHealth ID') }}
                {{ Form::text('philhealth_id', old('philhealth_id'), ['class' => 'form-control', 'autocomplete' => 'off']) }}
            </div>
            <div class="form-group col-md-3 mt-2">
                {{ Form::label('pagibig_id', 'Pagibig ID') }}
                {{ Form::text('pagibig_id', old('pagibig_id'), ['class' => 'form-control', 'autocomplete' => 'off']) }}
            </div>

            <hr class="col-md-12">
            <h3 class="col-md-12 mt-2">Contact Information</h3>
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-6 mt-2">
                        {{ Form::label('email', 'Personal Email') }}
                        {{ Form::email('email', old('email'), ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group col-md-6 mt-2">
                        {{ Form::label('contact_no', 'Contact No') }}
                        {{ Form::text('contact_no', old('contact_no'), ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        {{ Form::label('address', 'Address') }}
                        {{ Form::textarea('address', old('address'), ['class' => 'form-control', 'autocomplete' => 'off', 'rows' => 4]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script>
    const profilePic = document.querySelector('#profile-picture');
    const inputProfilePic = document.querySelector('input[name="profile_image"]');

    inputProfilePic.addEventListener('change', () => {
        // profilePic.src = this.value;
        // console.log(this.value);

        const reader = new FileReader();
        reader.onload = function (e) {
            profilePic.src = e.target.result;
        }
        reader.readAsDataURL(inputProfilePic.files[0]);

    });

    profilePic.addEventListener('error', () => {
        this.src = '/img/avatar-error.jpg';
    });

</script>
