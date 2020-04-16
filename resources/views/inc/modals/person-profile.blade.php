<!-- Profile Modal -->
<div class="modal fade" id="profileModal{{ $person->id }}" tabindex="-1" role="dialog"
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
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/storage/img/profile/{{ $person->profile_image }}"
                                class="img-fluid rounded">
                            <a href="/people/{{ $person->id }}/edit"
                                class="btn btn-info text-white d-block mt-2">Update</a>
                        </div>
                        <div class="col-md-8">
                            <div class="row">

                                <div class="col-md-12">
                                    <h5>Personal Details</h5>
                                    <p class="float-left"><strong>Name:
                                        </strong>{{ $person->lastname }}, {{ $person->firstname }}
                                        {{ $person->middlename }}<br>
                                        <strong>Birthdate: </strong>{{ $person->birthdate }}<br>
                                        <strong>Gender: </strong>{{ $person->gender }} <br>
                                        <strong>Marital Status: </strong>{{ $person->marital_status }}
                                    </p>

                                    <p class="float-right"><strong>SSS ID:
                                        </strong>{{ $person->sss_id }}<br>
                                        <strong>TIN ID: </strong>{{ $person->tin_id }}<br>
                                        <strong>Pagibig ID: </strong>{{ $person->pagibig_id }}<br>
                                        <strong>PhilHealth ID: </strong>{{ $person->philhealth_id }}
                                    </p>

                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <h5>Contact Details</h5>
                                    <p><strong>Email: </strong>{{ $person->email }}<br>
                                        <strong>Contact No.: </strong>{{ $person->contact_no }}<br>
                                        <strong>Address: </strong>{{ $person->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>